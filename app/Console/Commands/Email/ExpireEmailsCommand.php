<?php

namespace App\Console\Commands\Email;

use App\Enums\EmailStatusEnum;
use App\Models\Email;
use Illuminate\Console\Command;

class ExpireEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:expire';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->warn('Обнуление статуса имейлов...');

        $this->expireEmails();

        $this->info('Заявки на подтвержение имейлов обнулены!');
    }

    private function expireEmails(): void
    {
        Email::query()
            ->where('status', EmailStatusEnum::pending)
            ->where('created_at', '<=', now()->subWeek())
            ->update(['status' => EmailStatusEnum::expired]);
    }
}
