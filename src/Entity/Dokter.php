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
 * Entity class for "dokter" table
 */

#[Entity]
#[Table("dokter", options: ["dbId" => "DB"])]
class Dokter extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_dokter", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdDokter;

    #[Column(name: "nama", type: "string")]
    private string $Nama;

    #[Column(name: "spesialisasi", type: "string")]
    private string $Spesialisasi;

    #[Column(name: "no_lisensi", type: "string", unique: true)]
    private string $NoLisensi;

    #[Column(name: "tarif_konsultasi", type: "decimal")]
    private string $TarifKonsultasi;

    #[Column(name: "no_telp", type: "string", nullable: true)]
    private ?string $NoTelp;

    #[Column(name: "email", type: "string", nullable: true)]
    private ?string $Email;

    public function getIdDokter(): int
    {
        return $this->IdDokter;
    }

    public function setIdDokter(int $value): static
    {
        $this->IdDokter = $value;
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

    public function getSpesialisasi(): string
    {
        return HtmlDecode($this->Spesialisasi);
    }

    public function setSpesialisasi(string $value): static
    {
        $this->Spesialisasi = RemoveXss($value);
        return $this;
    }

    public function getNoLisensi(): string
    {
        return HtmlDecode($this->NoLisensi);
    }

    public function setNoLisensi(string $value): static
    {
        $this->NoLisensi = RemoveXss($value);
        return $this;
    }

    public function getTarifKonsultasi(): string
    {
        return $this->TarifKonsultasi;
    }

    public function setTarifKonsultasi(string $value): static
    {
        $this->TarifKonsultasi = $value;
        return $this;
    }

    public function getNoTelp(): ?string
    {
        return HtmlDecode($this->NoTelp);
    }

    public function setNoTelp(?string $value): static
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
}
