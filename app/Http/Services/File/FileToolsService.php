<?php

namespace App\Http\Services\file;

class FileToolsService
{

    protected $file;
    protected $exclusiveDirectory;
    protected $fileDirectory;
    protected $fileName;
    protected $fileFormat;
    protected $finalFileDirectory;
    protected $finalFileName;
    protected $fileSize;


    public function setFile($file)
    {
        $this->file = $file;
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
    public function getFileDirectory()
    {
        return $this->fileDirectory;
    }

    /**
     * @param mixed $fileDirectory
     */
    public function setFileDirectory($fileDirectory): void
    {
        $this->fileDirectory = $fileDirectory;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName): void
    {
        $this->fileName = $fileName;
    }

    public function setCurrentFileName()
    {
        return !empty($this->file) ? $this->setFileName(pathinfo($this->file->getClientOriginalName(), PATHINFO_FILENAME)) : false;
    }

    /**
     * @return mixed
     */
    public function getFileFormat()
    {
        return $this->fileFormat;
    }

    /**
     * @param mixed $fileFormat
     */
    public function setFileFormat($fileFormat): void
    {
        $this->fileFormat = $fileFormat;
    }

    /**
     * @return mixed
     */
    public function getFinalFileDirectory()
    {
        return $this->finalFileDirectory;
    }

    /**
     * @param mixed $finalFileDirectory
     */
    public function setFinalFileDirectory($finalFileDirectory): void
    {
        $this->finalFileDirectory = $finalFileDirectory;
    }

    /**
     * @param mixed $fileSize
     */
    public function setFileSize($file): void
    {
        $this->fileSize = $file->getSize();
    }

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param mixed $finalFileName
     */
    public function setFinalFileName($finalFileName): void
    {
        $this->finalFileName = $finalFileName;
    }

    /**
     * @return mixed
     */
    public function getFinalFileName()
    {
        return $this->finalFileName;
    }

    protected function checkDirectory($fileDirectory)
    {
        if (!file_exists($fileDirectory))
        {
            mkdir($fileDirectory, 777, true);
        }
    }

    public function getFileAddress(): string
    {
        return $this->finalFileDirectory . DIRECTORY_SEPARATOR . $this->finalFileName;
    }

    protected function provider()
    {
        //set properties
        $this->getFileDirectory() ?? $this->setFileDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
        $this->getFileName() ?? $this->setFileName(time());
        $this->setFileFormat(pathinfo($this->file->getClientOriginalName(), PATHINFO_EXTENSION));

        //get final file directory
        $finalFileDirectory = empty($this->getExclusiveDirectory()) ? $this->getFileDirectory() : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getFileDirectory();
        $this->setFinalFileDirectory($finalFileDirectory);

        //set final file name
        $this->setFinalFileName($this->getFileName() . '.' . $this->getFileFormat());

        //check and create final File directory
        $this->checkDirectory($this->getFinalFileDirectory());
    }

}
