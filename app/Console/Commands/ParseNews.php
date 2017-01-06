<?php

namespace Litalex\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Litalex\Parsers\NewsParser;

/**
 * Class ParseNews
 *
 * @package Litalex\Console\Commands
 */
class ParseNews extends Command
{
    /**
     * @var NewsParser
     */
    private $newsParser;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse news';

    /**
     * ParseNews constructor.
     *
     * @param NewsParser $newsParser
     */
    public function __construct(NewsParser $newsParser)
    {
        $this->newsParser = $newsParser;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $message = 'Parse news success!';

        if ($this->newsParser->parseFootballUa() != true) {
            $message = 'Parse news error';
        }

        $this->comment(PHP_EOL.$message.PHP_EOL);
        Log::info(PHP_EOL.$message.PHP_EOL);
    }
}
