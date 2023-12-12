<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
| Aqui você poderá cadastrar todos os canais de transmissão de eventos que seu
| suporte a aplicativos. Os retornos de chamada de autorização de canal fornecidos são
| usado para verificar se um usuário autenticado pode ouvir o canal.
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
