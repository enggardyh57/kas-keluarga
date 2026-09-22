# Kas Keluarga Ceria

Aplikasi **manajemen keuangan keluarga berbasis web** yang digunakan untuk membantu mencatat, mengelola, dan memantau transaksi keuangan keluarga secara lebih terstruktur.

Aplikasi menyediakan fitur pencatatan saldo awal, penarikan ATM, pengeluaran, anggaran bulanan, riwayat transaksi, serta laporan keuangan bulanan yang dilengkapi dengan grafik pengeluaran berdasarkan kategori.

Project ini dikembangkan menggunakan **CodeIgniter 3, PHP, dan MySQL**.

---

## ✨ Features

* 🔐 Login dan autentikasi pengguna
* 📊 Dashboard ringkasan keuangan
* 💳 Pengaturan saldo awal ATM dan tunai
* 💸 Pencatatan penarikan ATM
* 🛒 Pencatatan pengeluaran
* 🗂️ Pengelompokan pengeluaran berdasarkan kategori
* 🎯 Pengelolaan anggaran bulanan
* 📜 Riwayat transaksi
* 🔎 Pencarian transaksi
* 🗓️ Filter transaksi berdasarkan kategori dan bulan
* 📈 Laporan keuangan bulanan
* 📊 Grafik pengeluaran berdasarkan kategori
* 💰 Perhitungan saldo secara otomatis
* 🌓 Dark Mode dan Light Mode
* 📱 Responsive interface

---

## 🎯 Tujuan Aplikasi

**Kas Keluarga Ceria** dibuat untuk membantu pengelolaan keuangan keluarga dengan menyediakan pencatatan transaksi dan ringkasan keuangan dalam satu aplikasi.

Melalui aplikasi ini, pengguna dapat memantau:

* Saldo ATM
* Saldo tunai
* Total saldo
* Total penarikan ATM
* Total pengeluaran
* Pengeluaran berdasarkan kategori
* Anggaran dan realisasi pengeluaran
* Riwayat transaksi
* Ringkasan keuangan berdasarkan bulan

---

## 💰 Kategori Pengeluaran

Sistem menggunakan tiga kategori utama untuk pencatatan pengeluaran:

| Kategori      | Keterangan                        |
| ------------- | --------------------------------- |
| Belanja Rumah | Pengeluaran untuk kebutuhan rumah |
| Saku Bintang  | Pengeluaran Saku Bintang          |
| Saku Keysia   | Pengeluaran Saku Keysia           |

---

## 📊 Dashboard

Dashboard menampilkan ringkasan kondisi keuangan pengguna, meliputi:

* Saldo ATM
* Saldo Tunai
* Total Saldo
* Pengeluaran bulan berjalan
* Penarikan ATM bulan berjalan

Informasi saldo dan transaksi diperbarui berdasarkan data transaksi yang telah tercatat dalam sistem.

---

## 💵 Perhitungan Saldo

Aplikasi menggunakan konsep perpindahan saldo antara **ATM** dan **tunai**.

### Saldo ATM

```text
Saldo ATM = Saldo Awal ATM - Total Penarikan ATM
```

### Saldo Tunai

```text
Saldo Tunai = Saldo Awal Tunai + Total Penarikan ATM - Total Pengeluaran
```

### Total Saldo

```text
Total Saldo = Saldo ATM + Saldo Tunai
```

Perhitungan dilakukan secara otomatis berdasarkan transaksi yang tersimpan di dalam sistem.

---

## 💸 Pengeluaran

Pengguna dapat mencatat setiap transaksi pengeluaran berdasarkan:

* Tanggal
* Kategori
* Nominal
* Keterangan

Setiap pengeluaran akan memengaruhi saldo tunai dan tercatat dalam riwayat transaksi.

---

## 💳 Penarikan ATM

Fitur penarikan ATM digunakan untuk mencatat perpindahan uang dari saldo ATM menjadi saldo tunai.

Data penarikan meliputi:

* Tanggal penarikan
* Nominal penarikan
* Keterangan

Setiap transaksi penarikan akan mengurangi saldo ATM dan menambah saldo tunai.

---

## 🎯 Anggaran Bulanan

Fitur anggaran digunakan untuk menentukan batas pengeluaran pada setiap kategori dalam periode tertentu.

Sistem dapat menampilkan perbandingan antara:

* Anggaran yang ditetapkan
* Realisasi pengeluaran
* Sisa anggaran

Hal ini membantu pengguna memantau penggunaan anggaran selama periode berjalan.

---

## 📜 Riwayat Transaksi

Riwayat transaksi menampilkan seluruh transaksi keuangan yang telah dicatat dalam sistem.

Pengguna dapat melakukan:

* Pencarian transaksi
* Filter berdasarkan kategori
* Filter berdasarkan bulan
* Melihat detail transaksi

---

## 📈 Laporan Keuangan

Sistem menyediakan laporan keuangan berdasarkan periode bulanan.

Laporan menampilkan informasi seperti:

* Total penarikan ATM
* Total pengeluaran
* Total pengeluaran berdasarkan kategori
* Ringkasan saldo

Data pengeluaran juga ditampilkan dalam bentuk **grafik berdasarkan kategori** untuk memudahkan pemantauan penggunaan uang.

---

## 🛠️ Tech Stack

* **PHP**
* **CodeIgniter 3**
* **MySQL**
* **HTML**
* **CSS**
* **JavaScript**
* **Bootstrap**

---

## 🗄️ Database

Aplikasi menggunakan **MySQL** sebagai database untuk menyimpan data:

* Pengguna
* Saldo
* Penarikan ATM
* Pengeluaran
* Kategori
* Anggaran
* Riwayat transaksi


## 📌 Project Information

**Nama:** Kas Keluarga Ceria
**Framework:** CodeIgniter 3
**Bahasa Pemrograman:** PHP
**Database:** MySQL
**Frontend:** HTML, CSS, JavaScript, Bootstrap
