<?php


namespace Converter;

use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\Console\Exception\InvalidArgumentException;

class Converter
{
    private $input;
    private $output;

    public function __construct($input, $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    public function convertImages()
    {
        if (!is_dir($this->input)) {
            throw new InvalidArgumentException('Input directory is not a dir!');
        } else {
            $files = array_diff(scandir($this->input), ['..', '.']);
            if (!is_dir($this->output)) {
                mkdir($this->output);
            }
            foreach ($files as $file) {
                $img = Image::make($this->input . DIRECTORY_SEPARATOR . $file);
                $img->encode('png', 90)->save($this->output . DIRECTORY_SEPARATOR . $img->filename . '.png');
            }
        }
    }
}
