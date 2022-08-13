<?php

namespace App\Http\Services\Image;

class ImageToolsService
{

    protected $image;
    protected $exclusiveDirectory;
    protected $imageDirectory;
    protected $imageName;
    protected $imageFormat;
    protected $finalImageDirectory;
    protected $finalImageName;


    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getExclusiveDirectory()
    {
        return $this->exclusiveDirectory;
    }

    /**
     * @param mixed $exclusiveDirectory
     */
    public function setExclusiveDirectory($exclusiveDirectory): void
    {
        $this->exclusiveDirectory = trim($exclusiveDirectory, '/\\');
    }

    /**
     * @return mixed
     */
    public function getImageDirectory()
    {
        return $this->imageDirectory;
    }

    /**
     * @param mixed $imageDirectory
     */
    public function setImageDirectory($imageDirectory): void
    {
        $this->imageDirectory = $imageDirectory;
    }

    /**
     * @return mixed
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * @param mixed $imageName
     */
    public function setImageName($imageName): void
    {
        $this->imageName = $imageName;
    }

    public function setCurrentImageName()
    {
        return !empty($this->image) ? $this->setImageName(pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME)) : false;
    }

    /**
     * @return mixed
     */
    public function getImageFormat()
    {
        return $this->imageFormat;
    }

    /**
     * @param mixed $imageFormat
     */
    public function setImageFormat($imageFormat): void
    {
        $this->imageFormat = $imageFormat;
    }

    /**
     * @return mixed
     */
    public function getFinalImageDirectory()
    {
        return $this->finalImageDirectory;
    }

    /**
     * @param mixed $finalImageDirectory
     */
    public function setFinalImageDirectory($finalImageDirectory): void
    {
        $this->finalImageDirectory = $finalImageDirectory;
    }

    /**
     * @return mixed
     */
    public function getFinalImageName()
    {
        return $this->finalImageName;
    }

    /**
     * @param mixed $finalImageName
     */
    public function setFinalImageName($finalImageName): void
    {
        $this->finalImageName = $finalImageName;
    }

    protected function checkDirectory($imageDirectory)
    {
        if (!file_exists($imageDirectory))
        {
            mkdir($imageDirectory, 777, true);
        }
    }

    public function getImageAddress(): string
    {
        return $this->finalImageDirectory . DIRECTORY_SEPARATOR . $this->finalImageName;
    }

    protected function provider()
    {
        //set properties
        $this->getImageDirectory() ?? $this->setImageDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
        $this->getImageName() ?? $this->setImageName(time());
        $this->getImageFormat() ?? $this->setImageFormat($this->image->extension());

        //get final image directory
        $finalImageDirectory = empty($this->getExclusiveDirectory()) ? $this->getImageDirectory() : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getImageDirectory();
        $this->setFinalImageDirectory($finalImageDirectory);

        //set final image name
        $this->setFinalImageName($this->getImageName() . '.' . $this->getImageFormat());

        //check and create final image directory
        $this->checkDirectory($this->getFinalImageDirectory());
    }

}
