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
 * Entity class for "kunjungan" table
 */

#[Entity]
#[Table("kunjungan", options: ["dbId" => "DB"])]
class Kunjungan extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_kunjungan", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdKunjungan;

    #[Column(name: "id_pasien", type: "integer")]
    private int $IdPasien;

    #[Column(name: "id_dokter", type: "integer")]
    private int $IdDokter;

    #[Column(name: "id_jadwal", type: "integer", nullable: true)]
    private ?int $IdJadwal;

    #[Column(name: "tanggal", type: "date")]
    private DateTime $Tanggal;

    #[Column(name: "diagnosa", type: "text", nullable: true)]
    private ?string $Diagnosa;

    #[Column(name: "resep", type: "text", nullable: true)]
    private ?string $Resep;

    #[Column(name: "status", type: "string", nullable: true)]
    private ?string $Status;

    #[Column(name: "created_at", type: "datetime")]
    private DateTime $CreatedAt;

    public function __construct()
    {
        $this->Status = "Terdaftar";
    }

    public function getIdKunjungan(): int
    {
        return $this->IdKunjungan;
    }

    public function setIdKunjungan(int $value): static
    {
        $this->IdKunjungan = $value;
        return $this;
    }

    public function getIdPasien(): int
    {
        return $this->IdPasien;
    }

    public function setIdPasien(int $value): static
    {
        $this->IdPasien = $value;
        return $this;
    }

    public function getIdDokter(): int
    {
        return $this->IdDokter;
    }

    public function setIdDokter(int $value): static
    {
        $this->IdDokter = $value;
        return $this;
    }

    public function getIdJadwal(): ?int
    {
        return $this->IdJadwal;
    }

    public function setIdJadwal(?int $value): static
    {
        $this->IdJadwal = $value;
        return $this;
    }

    public function getTanggal(): DateTime
    {
        return $this->Tanggal;
    }

    public function setTanggal(DateTime $value): static
    {
        $this->Tanggal = $value;
        return $this;
    }

    public function getDiagnosa(): ?string
    {
        return HtmlDecode($this->Diagnosa);
    }

    public function setDiagnosa(?string $value): static
    {
        $this->Diagnosa = RemoveXss($value);
        return $this;
    }

    public function getResep(): ?string
    {
        return HtmlDecode($this->Resep);
    }

    public function setResep(?string $value): static
    {
        $this->Resep = RemoveXss($value);
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(?string $value): static
    {
        if (!in_array($value, ["Terdaftar", "Selesai", "Batal"])) {
            throw new \InvalidArgumentException("Invalid 'status' value");
        }
        $this->Status = $value;
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
