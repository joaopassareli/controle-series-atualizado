<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\SeriesCreated as SeriesCreatedEvent;

class EmailUsersAboutSeriesCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SeriesCreatedEvent $event)
    {
        $userList = User::all();

        foreach ($userList as $index => $user) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQty,
                $event->seriesEpisodesPerSeason,
                $event->cover_path,
            );
            //Foi necessário incluir o método later ao enviar os e-mails pois o mailtrap na versão gratuita trava o envio de mais de 5 e-mails
            //em menos de 10 segundos. Assim, colocamos o contador $when pra enviar cada email de 5 em 5 segundos.
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $email);
        }
        //Outra forma de enviar, porém, envia um único e-mail com cópia para todos os usuários cadastrados.
        //Mail::to($request->user()->all())->send($email);
    }
}
