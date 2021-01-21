<?php

namespace App\Console\Commands\zhtScheduler
    {
    use Illuminate\Console\Command;

    class ScheduledTask_EveryMonth extends Command
        {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'scheduledTask:everyMonth';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Laravel Console Agent - Every Month (on First Day of Month at 00:00)';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
            {
            parent::__construct();
            }

        /**
         * Execute the console command.
         *
         * @return int
         */
        public function handle()
            {
            $varFilePath = '/zhtConf/log/lastSession/scheduledTask/everyMonth/core.log';
            shell_exec("touch ".$varFilePath);
            //$this->info($varFilePath);

            return 1;
            //    return 0;
            }
        }
    }