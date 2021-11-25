<?php

namespace App\Service;
use MailchimpMarketing\ApiClient;

class Newsletter {
    public function subscribe(string $email, string $list = null) {

        return $this->getClient()->lists->addListMember($list ?? config('services.mailchim.lists.subscribers'), [
            'email_address' => request('subscribe'),
            'status' => 'subscribed'
        ]);
    }
    protected function getClient() {

        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us20'
        ]);
    }
}