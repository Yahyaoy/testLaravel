<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {

    }

    public function subscribe($email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }
}
