<?php


namespace Converter;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

use Converter\Converter;

class ConverterCommand extends Command
{
    protected function configure()
    {
        $this->setName("converter:convert")
             ->addArgument('input', InputArgument::OPTIONAL, 'Input directory', 'input')
             ->addArgument('output', InputArgument::OPTIONAL, 'Output directory')
             ->setDescription('Converts webp-images from input dir to output');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (is_null($input->getArgument('output')))
            $output_dir = "{$input->getArgument('input')}_output";

        $converter = new Converter(
            $input->getArgument('input'),
            $output_dir
        );
        $converter->convertImages();
    }
}