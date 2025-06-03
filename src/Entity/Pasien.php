<?php

namespace PHPMaker2025\apotik2025baru\Entity;

use DateTime;
use DateTimeImmutable;
use DateInterval;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\SequenceGenerator;
use Doctrine\DBAL\Types\Types;
use PHPMaker2025\apotik2025baru\AdvancedUserInterface;
use PHPMaker2025\apotik2025baru\AbstractEntity;
use PHPMaker2025\apotik2025baru\AdvancedSecurity;
use PHPMaker2025\apotik2025baru\UserProfile;
use PHPMaker2025\apotik2025baru\UserRepository;
use function PHPMaker2025\apotik2025baru\Config;
use function PHPMaker2025\apotik2025baru\EntityManager;
use function PHPMaker2025\apotik2025baru\RemoveXss;
use function PHPMaker2025\apotik2025baru\HtmlDecode;
use function PHPMaker2025\apotik2025baru\HashPassword;
use function PHPMaker2025\apotik2025baru\Security;

/**
 * Entity class for "pasien" table
 */

#[Entity]
#[Table("pasien", options: ["dbId" => "DB"])]
class Pasien extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_pasien", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdPasien;

    #[Column(name: "nama", type: "string")]
    private string $Nama;

    #[Column(name: "alamat", type: "text", nullable: true)]
    private ?string $Alamat;

    #[Column(name: "no_telp", type: "string")]
    private string $NoTelp;

    #[Column(name: "email", type: "string", nullable: true)]
    private ?string $Email;

    #[Column(name: "jenis_kelamin", type: "string", nullable: true)]
    private ?string $JenisKelamin;

    #[Column(name: "tanggal_lahir", type: "date", nullable: true)]
    private ?DateTime $TanggalLahir;

    #[Column(name: "alergi", type: "text", nullable: true)]
    private ?string $Alergi;

    #[Column(name: "created_at", type: "datetime")]
    private DateTime $CreatedAt;

    public function getIdPasien(): int
    {
        return $this->IdPasien;
    }

    public function setIdPasien(int $value): static
    {
        $this->IdPasien = $value;
        return $this;
    }

    public function getNama(): string
    {
        return HtmlDecode($this->Nama);
    }

    public function setNama(string $value): static
    {
        $this->Nama = RemoveXss($value);
        return $this;
    }

    public function getAlamat(): ?string
    {
        return HtmlDecode($this->Alamat);
    }

    public function setAlamat(?string $value): static
    {
        $this->Alamat = RemoveXss($value);
        return $this;
    }

    public function getNoTelp(): string
    {
        return HtmlDecode($this->NoTelp);
    }

    public function setNoTelp(string $value): static
    {
        $this->NoTelp = RemoveXss($value);
        return $this;
    }

    public function getEmail(): ?string
    {
        return HtmlDecode($this->Email);
    }

    public function setEmail(?string $value): static
    {
        $this->Email = RemoveXss($value);
        return $this;
    }

    public function getJenisKelamin(): ?string
    {
        return $this->JenisKelamin;
    }

    public function setJenisKelamin(?string $value): static
    {
        if (!in_array($value, ["Laki-laki", "Perempuan"])) {
            throw new \InvalidArgumentException("Invalid 'jenis_kelamin' value");
        }
        $this->JenisKelamin = $value;
        return $this;
    }

    public function getTanggalLahir(): ?DateTime
    {
        return $this->TanggalLahir;
    }

    public function setTanggalLahir(?DateTime $value): static
    {
        $this->TanggalLahir = $value;
        return $this;
    }

    public function getAlergi(): ?string
    {
        return HtmlDecode($this->Alergi);
    }

    public function setAlergi(?string $value): static
    {
        $this->Alergi = RemoveXss($value);
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(DateTime $value): static
    {
        $this->CreatedAt = $value;
        return $this;
    }
}
