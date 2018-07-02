<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 27.03.2018
 * Time: 16:39
 */
namespace Btybug\Console\Http\Controllers\API;



class ClientController extends \Laravel\Passport\Http\Controllers\ClientController
{
    public function update(Request $request, $clientId)
    {
        $client = $this->clients->findForUser($clientId, $request->user()->getKey());

        if (! $client) {
            return new Response('', 404);
        }

        $this->validation->make($request->all(), [
            'name' => 'required|max:255',
            'redirect' => 'required|url',
        ])->validate();

        return $this->clients->update(
            $client, $request->name, $request->redirect
        );
    }
}