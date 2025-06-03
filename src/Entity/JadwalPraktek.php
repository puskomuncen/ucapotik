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
 * Entity class for "jadwal_praktek" table
 */

#[Entity]
#[Table("jadwal_praktek", options: ["dbId" => "DB"])]
class JadwalPraktek extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_jadwal", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdJadwal;

    #[Column(name: "id_dokter", type: "integer")]
    private int $IdDokter;

    #[Column(name: "hari", type: "string", nullable: true)]
    private ?string $Hari;

    #[Column(name: "jam_mulai", type: "time")]
    private DateTime $JamMulai;

    #[Column(name: "jam_selesai", type: "time")]
    private DateTime $JamSelesai;

    #[Column(name: "kuota", type: "integer", nullable: true)]
    private ?int $Kuota;

    public function __construct()
    {
        $this->Kuota = 20;
    }

    public function getIdJadwal(): int
    {
        return $this->IdJadwal;
    }

    public function setIdJadwal(int $value): static
    {
        $this->IdJadwal = $value;
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

    public function getHari(): ?string
    {
        return $this->Hari;
    }

    public function setHari(?string $value): static
    {
        if (!in_array($value, ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"])) {
            throw new \InvalidArgumentException("Invalid 'hari' value");
        }
        $this->Hari = $value;
        return $this;
    }

    public function getJamMulai(): DateTime
    {
        return $this->JamMulai;
    }

    public function setJamMulai(DateTime $value): static
    {
        $this->JamMulai = $value;
        return $this;
    }

    public function getJamSelesai(): DateTime
    {
        return $this->JamSelesai;
    }

    public function setJamSelesai(DateTime $value): static
    {
        $this->JamSelesai = $value;
        return $this;
    }

    public function getKuota(): ?int
    {
        return $this->Kuota;
    }

    public function setKuota(?int $value): static
    {
        $this->Kuota = $value;
        return $this;
    }
}
