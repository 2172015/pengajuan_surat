<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pengajuan Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 md-5">
                <div>
                    <h1 class="text-center my-4">Form Pengajuan Surat</h3>
                </div>
                <div class="card mt-5 border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('pengajuan.create') }}" class="btn btn-md btn-success mb-3">Tambahkan Pengajuan</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">TANGGAL</th>
                                    <th scope="col">WAKTU</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">TUJUAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajuans as $pengajuan)
                                    <tr>
                                        <td>{{ $pengajuan->tanggal_pengajuan }}</td>
                                        <td>{{ $pengajuan->waktu_pengajuan }}</td>
                                        <td>
                                            @if($pengajuan->status == 0)
                                                Sudah Diajukan
                                            @elseif($pengajuan->status == 1)
                                                Berhasil
                                            @else
                                                Status Tidak Diketahui
                                            @endif
                                        </td>
                                        <td>{{ $pengajuan->tujuan_pengajuan }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST">
                                                <a href="{{ route('pengajuan.edit', $pengajuan->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Pengajuan belum ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pengajuans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>