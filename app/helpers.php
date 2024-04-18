<?php

function sendMail($email_data, $to, $to_name, $subject)
{
    $data = [
        'title' => $email_data->title,
        'link' => $email_data->link,
        'body' => $email_data->body,
    ];
    $to = $to;
    $to_name = $to_name;
    $subject = $subject;
    $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.email_v1', ['data' => $data], function ($message) use ($to, $to_name, $subject) {
        $message
            ->from('elisili@daystar.ac.ke')
            ->to($to, $to_name)
            ->subject($subject);
    });
}

function sendDefaultMail($email_data, $to, $to_name, $subject)
{
    $data = [
        'title' => $email_data->title,
        'link' => $email_data->link,
        'link_text' => $email_data->link_text,
        'date' => $email_data->date,
        'body' => $email_data->body,
    ];
    $to = $to;
    $to_name = $to_name;
    $subject = $subject;
    $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
    $beautymail->send('emails.default', ['data' => $data], function ($message) use ($to, $to_name, $subject) {
        $message
            ->from('elisili@daystar.ac.ke')
            ->to($to, $to_name)
            ->subject($subject);
    });
}
