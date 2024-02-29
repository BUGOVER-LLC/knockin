<?php

declare(strict_types=1);

namespace Src\Core\Abstract;

abstract class AbstractDTO
{
    private ?object $user;

    private ?int $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUser(): ?object
    {
        return $this->user;
    }

    public function setUser(object $user): static
    {
        $this->user = $user;

        return $this;
    }
}
