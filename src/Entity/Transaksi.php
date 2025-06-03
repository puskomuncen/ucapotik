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
 * Entity class for "transaksi" table
 */

#[Entity]
#[Table("transaksi", options: ["dbId" => "DB"])]
class Transaksi extends AbstractEntity
{
    #[Id]
    #[Column(name: "id_transaksi", type: "integer", unique: true)]
    #[GeneratedValue]
    private int $IdTransaksi;

    #[Column(name: "id_kunjungan", type: "integer")]
    private int $IdKunjungan;

    #[Column(name: "total_biaya", type: "decimal")]
    private string $TotalBiaya;

    #[Column(name: "metode_pembayaran", type: "string", nullable: true)]
    private ?string $MetodePembayaran;

    #[Column(name: "status_pembayaran", type: "string", nullable: true)]
    private ?string $StatusPembayaran;

    #[Column(name: "tanggal_transaksi", type: "datetime")]
    private DateTime $TanggalTransaksi;

    public function __construct()
    {
        $this->StatusPembayaran = "Pending";
    }

    public function getIdTransaksi(): int
    {
        return $this->IdTransaksi;
    }

    public function setIdTransaksi(int $value): static
    {
        $this->IdTransaksi = $value;
        return $this;
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

    public function getTotalBiaya(): string
    {
        return $this->TotalBiaya;
    }

    public function setTotalBiaya(string $value): static
    {
        $this->TotalBiaya = $value;
        return $this;
    }

    public function getMetodePembayaran(): ?string
    {
        return $this->MetodePembayaran;
    }

    public function setMetodePembayaran(?string $value): static
    {
        if (!in_array($value, ["Tunai", "Transfer", "QRIS", "Kartu"])) {
            throw new \InvalidArgumentException("Invalid 'metode_pembayaran' value");
        }
        $this->MetodePembayaran = $value;
        return $this;
    }

    public function getStatusPembayaran(): ?string
    {
        return $this->StatusPembayaran;
    }

    public function setStatusPembayaran(?string $value): static
    {
        if (!in_array($value, ["Pending", "Lunas", "Gagal"])) {
            throw new \InvalidArgumentException("Invalid 'status_pembayaran' value");
        }
        $this->StatusPembayaran = $value;
        return $this;
    }

    public function getTanggalTransaksi(): DateTime
    {
        return $this->TanggalTransaksi;
    }

    public function setTanggalTransaksi(DateTime $value): static
    {
        $this->TanggalTransaksi = $value;
        return $this;
    }
}
