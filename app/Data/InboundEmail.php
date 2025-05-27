<?php

namespace App\Data;

class InboundEmail
{
    public readonly string $messageId;
    public string $fromEmail;
    public string $toEmail;
    public string $subject;
    public string $htmlBody;
    public array $rawHeaders = [];
    public array $headers = [];

    private int $spamThreshold = 7;

    public function __construct(array $data)
    {
        $this->messageId = $data['MessageID'];
        $this->fromEmail = $data['FromFull']['Email'];
        $this->toEmail = $data['ToFull'][0]['Email'];
        $this->subject = $data['Subject'];
        $this->htmlBody = $data['HtmlBody'];
        $this->rawHeaders = $data['Headers'];

        foreach ($this->rawHeaders as $header) {
            if (isset($header['Name'], $header['Value'])) {
                $this->headers[$header['Name']] = $header['Value'];
            }
        }
    }

    public function isSpam(): bool
    {
        if($this->headers['X-Spam-Status'] == "Yes")
        {
            return true;
        }

        if((int)$this->headers['X-Spam-Score'] >= $this->spamThreshold)
        {
            return true;
        }

        return false;
    }
}
