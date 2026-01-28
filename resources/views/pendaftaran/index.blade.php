<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Kedatangan Tamu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4274BA;
            --secondary: #2c3e50;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --success: #2ecc71;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .flayer-section {
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
        }

        .flayer-image {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }

        .form-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        @media (max-width: 768px) {
            .form-container {
                grid-template-columns: 1fr;
            }
        }

        .form-section {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }

        .form-section h2 {
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }

        .btn-submit {
            background-color: var(--success);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1.1rem;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }

        .file-name {
            font-size: 0.9rem;
            margin-top: 10px;
        }

        #previewImage,
        #previewImage2 {
            margin-top: 15px;
            max-width: 200px;
            display: none;
            border-radius: 8px;
            box-shadow: var(--shadow);
        }

        .price-note {
            margin-top: 4px;
            font-size: 0.9rem;
            color: #6c757d;
            font-style: italic;
        }
    </style>

    {{-- style cari satuan kerja --}}
    <style>
        /* Pop-up Overlay */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .popup-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Pop-up Container */
        .popup-container {
            background-color: white;
            width: 90%;
            max-width: 800px;
            max-height: 85vh;
            display: flex;
            flex-direction: column;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            transform: translateY(-20px);
            transition: transform 0.4s ease;
        }

        .popup-overlay.active .popup-container {
            transform: translateY(0);
        }

        /* Pop-up Header */
        .popup-header {
            background: linear-gradient(135deg, #1a2980, #26d0ce);
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .popup-title {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 2rem;
            cursor: pointer;
            line-height: 1;
            transition: transform 0.2s;
        }

        .close-btn:hover {
            transform: scale(1.2);
        }

        /* Search Container */
        .search-container {
            padding: 20px 30px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #eaeaea;
        }

        .search-box {
            width: 100%;
            padding: 14px 20px;
            border: 2px solid #ddd;
            border-radius: 50px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .search-box:focus {
            outline: none;
            border-color: #2d5af1;
        }

        /* Table Container */
        .table-container {
            flex: 1;
            overflow-y: auto;
            padding: 0 20px;
            padding: 0 10px 10px 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            position: sticky;
            top: 0;
            background-color: #f1f5fd;
            z-index: 10;
        }

        th {
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            color: #1a2980;
            border-bottom: 2px solid #e0e7ff;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background-color: #f8faff;
        }

        .no-data {
            text-align: center;
            padding: 40px;
            color: #777;
            font-style: italic;
        }

        /* Footer */
        .popup-footer {
            padding: 20px 30px;
            background-color: #f8f9fa;
            text-align: center;
            border-top: 1px solid #eaeaea;
            color: #666;
        }

        .result-count {
            font-weight: 600;
            color: #2d5af1;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .popup-container {
                width: 95%;
            }

            .popup-header,
            .search-container,
            .popup-footer {
                padding: 15px 20px;
                flex-shrink: 0;
            }

            th,
            td {
                padding: 12px 10px;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>

    <style>
        .campus-row {
            cursor: pointer;
        }

        .campus-row:hover {
            background-color: #f3f4f6;
        }

        .satker-wrapper {
            display: flex;
            gap: 8px;
        }

        .satker-wrapper input {
            flex: 1;
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .satker-wrapper button {
            padding: 10px 16px;
            font-size: 14px;
            cursor: pointer;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
        }

        .satker-wrapper button:hover {
            background-color: #1e4ed8;
        }
    </style>

    <style>
        .form-row-custom {
            display: flex;
            gap: 12px;
        }

        .form-row-custom .form-group.acara {
            flex: 0 0 30%;
        }

        .form-row-custom .form-group.total {
            flex: 0 0 70%;
        }

        @media (max-width: 600px) {
            .form-row-custom {
                flex-direction: column;
            }

            .form-row-custom .form-group.acara,
            .form-row-custom .form-group.total {
                flex: 1;
            }
        }
    </style>

    <style>
        .info-card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            border: 1px solid #eef2f7;
            transition: all 0.3s ease;
            display: flex;
            align-items: flex-start;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-color: #c3cfe2;
        }

        .info-card:last-child {
            margin-bottom: 0;
        }

        .info-content {
            flex-grow: 1;
        }

        .info-content h3 {
            color: #1a2980;
            margin-bottom: 8px;
            font-size: 1.3rem;
        }

        .info-content p {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Tombol WhatsApp */
        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            background-color: #25D366;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.4);
        }

        .whatsapp-btn i {
            margin-right: 10px;
            font-size: 1.4rem;
        }

        /* Tombol Lokasi */
        .location-btn {
            display: inline-flex;
            align-items: center;
            background-color: #4285F4;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(66, 133, 244, 0.3);
        }

        .location-btn:hover {
            background-color: #3367D6;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(66, 133, 244, 0.4);
        }

        .location-btn i {
            margin-right: 10px;
            font-size: 1.4rem;
        }

        .contact-details {
            background-color: #f0f7ff;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            border-left: 4px solid #4285F4;
        }

        .contact-details p {
            margin: 8px 0;
            color: #2d3748;
        }

        .highlight {
            color: #1a2980;
            font-weight: 600;
        }

        .hotel-name {
            color: #1a2980;
            font-weight: 700;
            font-size: 1.2rem;
        }
    </style>

    <style>
        .payment-info {
            margin-top: 20px;
            padding: 16px;
            background: #f8fafc;
            border-left: 4px solid #2563eb;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
        }

        .payment-info h5 {
            margin-bottom: 12px;
            font-size: 1.1rem;
            color: #1e3a8a;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .payment-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .payment-info ul li {
            margin-bottom: 8px;
            color: #374151;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .payment-info ul li i {
            color: #2563eb;
        }

        .payment-info .note {
            margin-top: 12px;
            font-size: 0.9rem;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 6px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container">

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: @json(session('error')),
                    confirmButtonColor: '#e74c3c'
                });
            </script>
        @endif

        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Periksa kembali input Anda',
                    html: `
                        <ul style="text-align:left; margin-left:20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    `,
                    confirmButtonColor: '#f1c40f'
                });
            </script>
        @endif

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    confirmButtonColor: '#27ae60'
                });
            </script>
        @endif

        <!-- 🔵 Flayer Paling Atas -->
        <div class="flayer-section">
            <img src="{{ asset('own_assets/images/banner.png') }}" alt="Flayer Acara" class="flayer-image">
        </div>

        <div class="form-header">
            <h1>Formulir Pendaftaran</h1>
            <p>Forum Rektor PTKIN Kementerian Agama RI Tahun 2026</p>
        </div>

        <form action="/pendaftaran" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-container">

                <!-- Kolom Kiri -->
                <div class="form-section">
                    <h2>Data Pribadi</h2>

                    <div class="form-group">
                        <label class="required">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="form-control"
                            placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label class="required">Gender</label>
                        <select name="gender" class="form-control" value="{{ old('gender') }}" required>
                            <option value="" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>:: Pilih Gender
                                ::</option>
                            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">NIP</label>
                        <input type="text" id="nip" name="nip" value="{{ old('nip') }}"
                            class="form-control" placeholder="Masukkan NIP (maksimal 20 digit)" maxlength="20" required>
                    </div>

                    <div class="form-group">
                        <label class="required">Pangkat / Golongan</label>
                        <select name="pangkat" class="form-control" value="{{ old('pangkat') }}" required>
                            <option value="II/A" {{ old('pangkat') == 'II/A' ? 'selected' : '' }}>II/A</option>
                            <option value="II/B" {{ old('pangkat') == 'II/B' ? 'selected' : '' }}>II/B</option>
                            <option value="II/C" {{ old('pangkat') == 'II/C' ? 'selected' : '' }}>II/C</option>
                            <option value="II/D" {{ old('pangkat') == 'II/D' ? 'selected' : '' }}>II/D</option>
                            <option value="III/A" {{ old('pangkat') == 'III/A' ? 'selected' : '' }}>III/A</option>
                            <option value="III/B" {{ old('pangkat') == 'III/B' ? 'selected' : '' }}>III/B</option>
                            <option value="III/C" {{ old('pangkat') == 'III/C' ? 'selected' : '' }}>III/C</option>
                            <option value="III/D" {{ old('pangkat') == 'III/D' ? 'selected' : '' }}>III/D</option>
                            <option value="IV/A" {{ old('pangkat') == 'IV/A' ? 'selected' : '' }}>IV/A</option>
                            <option value="IV/B" {{ old('pangkat') == 'IV/B' ? 'selected' : '' }}>IV/B</option>
                            <option value="IV/C" {{ old('pangkat') == 'IV/C' ? 'selected' : '' }}>IV/C</option>
                            <option value="IV/D" {{ old('pangkat') == 'IV/D' ? 'selected' : '' }}>IV/D</option>
                            <option value="IV/E" {{ old('pangkat') == 'IV/E' ? 'selected' : '' }}>IV/E</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}"
                            class="form-control" placeholder="Masukkan Jabatan" required>
                    </div>

                    {{-- <div class="form-group">
                        <label class="required">Satuan Kerja</label>

                        <div class="input-group">
                            <input type="text" id="satker" name="satker" class="form-control"
                                value="{{ old('satker') }}" placeholder="Masukkan Satuan Kerja" required readonly>

                            <button class="btn btn-outline-primary" type="button" id="openPopup">
                                Cari
                            </button>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <label class="required">Satuan Kerja</label>

                        <div class="satker-wrapper input-group">
                            <input type="text" id="satker" class="form-control" name="satker"
                                value="{{ old('satker') }}" placeholder="Masukkan Satuan Kerja" required readonly>

                            <button type="button" id="openPopup">
                                Cari Satuan Kerja
                            </button>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="required">Nomor Handphone / Whatsapp</label>
                        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                            class="form-control" placeholder="Nomor Handphone / Whatsapp" maxlength="20" required>
                    </div>

                    <div class="form-group">
                        <label class="required">Upload Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control" required>
                        <div id="fileName" class="file-name">Belum ada file yang dipilih</div>
                        <img id="previewImage">
                    </div>

                </div>

                <!-- Kolom Kanan -->
                <div class="form-section">
                    <h2>Informasi Kedatangan</h2>

                    <div class="form-group">
                        <label class="required">Tanggal Kedatangan</label>
                        <input type="date" name="tanggal" value="{{ old('tanggal') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="required">Jam Kedatangan</label>
                        <input type="time" name="jam" value="{{ old('jam') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="required">Maskapai / Armada</label>
                        <select name="maskapai" class="form-control" value="{{ old('maskapai') }}">
                            <option value="" {{ old('maskapai') == 'S' ? 'selected' : '' }}></option>
                            <option value="Garuda Indonesia" {{ old('maskapai') == 'S' ? 'selected' : '' }}>Garuda
                                Indonesia</option>
                            <option value="Citilink" {{ old('maskapai') == 'Citilink' ? 'selected' : '' }}>Citilink
                            </option>
                            <option value="Lion Air" {{ old('maskapai') == 'Lion Air' ? 'selected' : '' }}>Lion Air
                            </option>
                            <option value="Batik Air" {{ old('maskapai') == 'Batik Air' ? 'selected' : '' }}>Batik Air
                            </option>
                            <option value="Sriwijaya Air" {{ old('maskapai') == 'Sriwijaya Air' ? 'selected' : '' }}>
                                Sriwijaya Air</option>
                            <option value="Super Air Jet" {{ old('maskapai') == 'Super Air Jet' ? 'selected' : '' }}>
                                Super Air Jet</option>
                            <option value="Wings Air" {{ old('maskapai') == 'Wings Air' ? 'selected' : '' }}>Wings Air
                            </option>
                            <option value="Pelita Air" {{ old('maskapai') == 'Pelita Air' ? 'selected' : '' }}>Pelita
                                Air</option>
                            <option value="Nam Air" {{ old('maskapai') == 'Nam Air' ? 'selected' : '' }}>Nam Air
                            </option>
                            <option value="TransNusa" {{ old('maskapai') == 'TransNusa' ? 'selected' : '' }}>TransNusa
                            </option>
                            <option value="Lainnya" {{ old('maskapai') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">Pilih Kamar</label>
                        <select name="kamar" id="kamar" class="form-control" value="{{ old('kamar') }}"
                            required>
                            <option value="Single">Single | 1 kamar 1 orang - (harga 1 Orang /malam Rp.1.400.000)</option>
                            <option value="Twin">Twin | 1 kamar 2 orang - (harga 1 Orang /malam Rp.800.000)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="required">Jumlah Orang</label>
                        <input type="text" value="1 Orang" readonly class="form-control">
                    </div>

                    <div class="form-row-custom">

                        <div class="form-group acara">
                            <label class="required">Jumlah Malam</label>
                            <input type="text" value="2 Malam" readonly class="form-control">
                        </div>

                        <div class="form-group total">
                            <label class="required">Total Pembayaran</label>
                            <input type="text" id="total_bayar" class="form-control" value="Rp. 2.800.000"
                                readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="payment-info">
                            <h5>
                                <i class="fas fa-university"></i> Informasi Rekening Pembayaran
                            </h5>

                            <ul>
                                <li>
                                    <i class="fas fa-credit-card"></i>
                                    <strong>Bank</strong> : BSI (Bank Syariah Indonesia)
                                </li>
                                <li>
                                    <i class="fas fa-hashtag"></i>
                                    <strong>No. Rekening</strong> : 7084334159
                                </li>
                                <li>
                                    <i class="fas fa-user"></i>
                                    <strong>Atas Nama</strong> : Dwi Sandhi Romadhon
                                </li>
                            </ul>

                            <p class="note">
                                <i class="fas fa-info-circle"></i>
                                Mohon melakukan pembayaran sesuai total yang tertera dan Bukti Transfer Diupload untuk
                                Dilakukan Validasi Pembayaran
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="required">Upload Bukti Pembayaran</label>
                        <input type="file" id="bb" name="bb" class="form-control" required>
                        <div id="fileName2" class="file-name">Belum ada file yang dipilih</div>
                        <img id="previewImage2">
                    </div>

                </div>

            </div>

            <button class="btn-submit" type="submit">Kirim Formulir</button>
        </form>

        <div class="form-group">
            <!-- Informasi Kontak dengan WhatsApp -->
            <div class="info-card">
                <div class="info-content">
                    <h3>Kontak Panitia</h3>
                    <p>Untuk informasi lebih lanjut tentang acara, Anda dapat menghubungi panitia kami:</p>

                    <div class="contact-details">
                        <p><span class="highlight">Nama:</span> Dwi Sandhi Romadhon, S.E, M.Si</p>
                        <p><span class="highlight">Jabatan:</span> Koordinator Acara</p>
                        <p><span class="highlight">No. Telepon:</span> +62 811-6584-545</p>
                    </div>

                    <a href="https://wa.me/628116584545?text=Halo%20Pak%20Dwi%20Sandhi%20Romadhon,%20saya%20ingin%20bertanya%20tentang%20acara%20ini"
                        target="_blank" class="whatsapp-btn">
                        <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                    </a>
                </div>
            </div>

            <!-- Informasi Lokasi dengan Maps -->
            <div class="info-card">
                <div class="info-content">
                    <h3>Lokasi Acara</h3>
                    <p>Acara ini akan diselenggarakan di:</p>

                    <div class="contact-details">
                        <p><span class="highlight">Nama Hotel:</span> <span class="hotel-name">Hotel Grand City
                                Hall</span></p>
                        <p><span class="highlight">Alamat:</span> Jl. Balai Kota No.1, Kesawan, Kec. Medan Bar., Kota
                            Medan, Sumatera Utara 20112</p>
                    </div>

                    <a href="https://maps.app.goo.gl/WhSJucWWfkvqyE8L9" target="_blank" class="location-btn">
                        <i class="fas fa-map-marked-alt"></i> Lihat Lokasi di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-container">
            <!-- Pop-up Header -->
            <div class="popup-header">
                <h2 class="popup-title">Satuan Kerja</h2>
                <button class="close-btn" id="closePopup">&times;</button>
            </div>

            <!-- Search Box -->
            <div class="search-container">
                <input type="text" class="search-box" id="searchInput" placeholder="Cari Satuan Kerja...">
            </div>

            <!-- Table Container -->
            <div class="table-container">
                <table id="campusTable">
                    <thead>
                        <tr>
                            <th width="15%">No.</th>
                            <th>Nama Kampus</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data kampus akan dimuat di sini -->
                    </tbody>
                </table>
                <div id="noDataMessage" class="no-data" style="display: none;">
                    Tidak ditemukan kampus yang sesuai dengan pencarian.
                </div>
            </div>

            <!-- Pop-up Footer -->
            <div class="popup-footer">
                Total ditemukan: <span class="result-count" id="resultCount">0</span> kampus
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U="
        crossorigin="anonymous"></script>
    <script>
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        }

        $("#kamar").on("change", function() {
            let val = $(this).val();
            if (val == 'Single') {
                $("#total_bayar").val(formatRupiah(1400000 * 2));
            } else {
                $("#total_bayar").val(formatRupiah(800000 * 2));
            }
        })
    </script>

    <script>
        // 🔒 NIP hanya angka
        document.getElementById('nip').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '').slice(0, 20);
        });

        // 📷 Preview gambar setelah upload
        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileName = file ? file.name : 'Belum ada file yang dipilih';
            document.getElementById('fileName').textContent = fileName;

            const preview = document.getElementById('previewImage');

            // reset preview
            preview.style.display = 'none';
            preview.src = '';

            if (!file) return;

            // jika file PDF, jangan preview
            if (file.type === 'application/pdf') {
                return;
            }

            // hanya preview jika file gambar
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });


        document.getElementById('bb').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const fileName = file ? file.name : 'Belum ada file yang dipilih';
            document.getElementById('fileName2').textContent = fileName;

            const preview = document.getElementById('previewImage2');

            // reset preview
            preview.style.display = 'none';
            preview.src = '';

            if (!file) return;

            // jika PDF, jangan preview
            if (file.type === 'application/pdf') {
                return;
            }

            // preview hanya untuk gambar
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    </script>

    {{-- cari satuan kerja --}}
    <script>
        // Data kampus contoh
        const campusData = @json($satker);

        // DOM Elements
        const openPopupBtn = document.getElementById('openPopup');
        const closePopupBtn = document.getElementById('closePopup');
        const popupOverlay = document.getElementById('popupOverlay');
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('tableBody');
        const resultCount = document.getElementById('resultCount');
        const noDataMessage = document.getElementById('noDataMessage');

        // Open pop-up
        openPopupBtn.addEventListener('click', () => {
            popupOverlay.classList.add('active');
            document.body.style.overflow = 'hidden'; // Mencegah scroll di background
            // Fokus ke input pencarian saat pop-up terbuka
            setTimeout(() => {
                searchInput.focus();
            }, 300);
        });

        // Close pop-up
        closePopupBtn.addEventListener('click', closePopup);
        popupOverlay.addEventListener('click', (e) => {
            if (e.target === popupOverlay) {
                closePopup();
            }
        });

        // Close pop-up dengan Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && popupOverlay.classList.contains('active')) {
                closePopup();
            }
        });

        function closePopup() {
            popupOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
            // Reset pencarian saat menutup pop-up
            searchInput.value = '';
            renderTable(campusData);
        }

        // Render tabel dengan data
        function renderTable(data) {
            tableBody.innerHTML = '';

            if (data.length === 0) {
                noDataMessage.style.display = 'block';
                resultCount.textContent = '0';
                return;
            }

            noDataMessage.style.display = 'none';
            resultCount.textContent = data.length;

            data.forEach((campus, index) => {
                const row = document.createElement('tr');

                row.classList.add('campus-row');
                row.dataset.id = campus.id;
                row.dataset.nama = campus.nama;

                const numberCell = document.createElement('td');
                numberCell.textContent = index + 1;

                const nameCell = document.createElement('td');
                nameCell.textContent = campus.nama; // ✅ BENAR

                row.appendChild(numberCell);
                row.appendChild(nameCell);
                tableBody.appendChild(row);
            });


        }

        // Filter data berdasarkan input pencarian
        function filterCampus(searchTerm) {
            const filteredData = campusData.filter(campus => {
                return campus.nama.toLowerCase().includes(searchTerm.toLowerCase());
            });
            renderTable(filteredData);
        }


        // Live search event listener
        searchInput.addEventListener('input', (e) => {
            filterCampus(e.target.value);
        });

        tableBody.addEventListener('click', function(e) {
            const row = e.target.closest('tr.campus-row');
            if (!row) return;

            const namaSatker = row.dataset.nama;

            // 🔥 ISI INPUT DENGAN CLASS "satker"
            const satkerInput = document.getElementById('satker');
            if (satkerInput) {
                satkerInput.value = namaSatker;
            }

            // (Opsional) tutup popup setelah pilih
            closePopup();
        });



        renderTable(campusData);
    </script>

    <script>
        // Tambahkan efek interaktif pada tombol
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.whatsapp-btn, .location-btn');

            buttons.forEach(button => {
                // Efek hover
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });

                // Efek klik
                button.addEventListener('mousedown', function() {
                    this.style.transform = 'translateY(0)';
                });

                button.addEventListener('mouseup', function() {
                    this.style.transform = 'translateY(-3px)';
                });
            });

            // Tambahkan animasi saat halaman dimuat
            const infoCards = document.querySelectorAll('.info-card');
            infoCards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 200 * index);
            });
        });
    </script>

</body>

</html>
