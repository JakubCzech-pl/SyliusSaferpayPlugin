<?php

declare(strict_types=1);

namespace CommerceWeavers\SyliusSaferpayPlugin\Client\ValueObject;

use CommerceWeavers\SyliusSaferpayPlugin\Client\ValueObject\Header\ResponseHeader;

class AuthorizeResponse
{
    public function __construct(
        private ResponseHeader $responseHeader,
        private string $token,
        private string $expiration,
        private string $redirectUrl,
    ) {
    }

    public function getResponseHeader(): ResponseHeader
    {
        return $this->responseHeader;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getExpiration(): string
    {
        return $this->expiration;
    }

    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            ResponseHeader::fromArray($data['ResponseHeader']),
            $data['Token'],
            $data['Expiration'],
            $data['RedirectUrl'],
        );
    }
}
