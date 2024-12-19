<?php

namespace App\Modules\Media;

use App\Modules\Media\Model\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaUtil
{
    private $model;
    public function __construct(Media $model)
    {
        $this->model = $model;
    }

    public function all($paginate = true, $limit = 10)
    {
        if ($paginate) {
            return $this->model->with(['uploadBy'])->paginate($limit);
        }
        return $this->model->with(['uploadBy'])->all();
    }

    public function getOne($id)
    {
        return $this->model->where(['id' => $id])->first();
    }

    public function insert($data, $key = 'file')
    {
        $mediaData = $this->save($data, $key);
        return $this->model->create($mediaData);
    }


    public function update($id, $data)
    {
        $updated = $this->model->where(['id' => $id])->update($data);
    }

    public function delete($id)
    {
        $deleted = $this->model->where(['id' => $id])->delete();
    }

    public function save($data, $key = 'file')
    {
        $file = $data[$key];
        $metadata = $this->getMediaMetaData($file);

        $filename = $metadata['filename'];
        $extension = $metadata['file_extension'];
        $directory = 'media';
        $disk = 'public';
        $finalFilename = $filename;
        while (Storage::disk($disk)->exists("$directory/$finalFilename.$extension")) {
            $randomString = Str::random(8);
            $finalFilename = "{$filename}_{$randomString}";
        }

        $path = $file->storeAs($directory, "$finalFilename.$extension", $disk);

        return [
            'url' => url("storage/$path"),
            'filename' => $finalFilename . "." . $metadata['file_extension'],
            'file_size' => $metadata['file_size'],
            'file_size_unit' => $metadata['file_size_unit'],
            'file_extension' => $metadata['file_extension'],
            'created_by_id' => Auth::id()
        ];
    }

    public function getMediaMetaData($file)
    {
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $sanitizedName = Str::slug($originalName, '_');

        return [
            'filename' => $sanitizedName,
            'file_size' => round($file->getSize() / 1048576, 2),
            'file_size_unit' => 'MB',
            'file_extension' => $file->getClientOriginalExtension(),
        ];
    }
}
