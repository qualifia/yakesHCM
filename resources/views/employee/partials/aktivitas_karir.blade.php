{{-- partials/aktivitas_karir.blade.php --}}
<div class="content">
    <div class="content5" >
        <div class="left-content">
          <h4 class="content-info">Aktivitas Karir</h4>
        </div>
        <div class="right-content3">
          <a href="#" class="add-btn" data-bs-toggle="modal" data-bs-target="#tambahAktivitasModal"><i class="fas fa-plus"></i>Tambah</a>
        </div>
    </div> 

    <div class="card-body">
        @if($career->isEmpty())
            <p class="text-muted">Belum ada data aktivitas karir.</p>
        @else
            <div class="timeline">
                @foreach($career as $item)
                    <div class="timeline-item">
                        <h6>{{ $item->judul }}</h6>
                        <p>{{ $item->deskripsi }}</p>
                        <small>{{ $item->tanggal }}</small>
                        <div class="mt-2">
                            <a  data-bs-toggle="modal" data-bs-target="#editAktivitasModal{{ $item->id }}" class="edit-btn"><i class="fas fa-pen"></i>Edit</a>
                            <form action="{{ route('career.delete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                    {{-- Modal Edit Aktivitas --}}
                    <div class="modal fade" id="editAktivitasModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('career.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Aktivitas Karir</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" name="judul" class="form-control" value="{{ $item->judul }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" required>{{ $item->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" value="{{ $item->tanggal }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sk_file" class="form-label">Upload SK (opsional)</label>
                                        <input type="file" name="sk_file" class="form-control">
                                        @if($item->sk_file)
                                            <small class="text-muted">File saat ini: {{ $item->sk_file }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>


{{-- Modal Tambah Aktivitas --}}
<div class="modal" id="tambahAktivitasModal">
    <div class="modal-dialog">
        <form action="{{ route('employee.career.store', $employee->id) }}" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="content6">
                <div class="left-content6">
                    <h5>Tambah Aktivitas Karir</h5>
                </div>
                
                <div class="right-content6">
                    <div id="extraFields"></div>
                    <a href="#" class="addInfo-btn" id="addFieldBtn"><i class="fas fa-plus"></i>Tambah Informasi Lain</a>

                    <button data-bs-dismiss="modal" class="close-button">
                        <i class="fas fa-circle-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="form-grid1">
                <div class="form-group">
                    <div class="label-group">
                        <label>Nama Role</label>
                        <label class="bintang">*</label>
                    </div>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Regional/Direktorat</label>
                        <label class="bintang">*</label>
                    </div>
                    <select name="regional_direktorat" class="form-control1"  required>
                        <option disabled selected value=""></option>
                        <option value="blablabla">blablabla</option>
                        <option value="claclacla">claclacla</option>
                        <option value="dladladla">dladladla</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Unit/Sub Direktorat</label>
                        <label class="bintang">*</label>
                    </div>
                    <select name="unitSub" class="form-control1"  required>
                        <option disabled selected value=""></option>
                        <option value="blablabla">blablabla</option>
                        <option value="claclacla">claclacla</option>
                        <option value="dladladla">dladladla</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Band</label>
                        <label class="bintang">*</label>
                    </div>
                    <select name="band" class="form-control1"  required>
                        <option disabled selected value=""></option>
                        <option value="blablabla">blablabla</option>
                        <option value="claclacla">claclacla</option>
                        <option value="dladladla">dladladla</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Deskripsi</label>
                        <label class="bintang">*</label>
                    </div>
                    <input type="text" name="deskripsi" class="form-control" required>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Status PJ</label>
                        <label class="bintang">*</label>
                    </div>
                    <select name="statusPJ" class="form-control1"  required>
                        <option disabled selected value=""></option>
                        <option value="blablabla">blablabla</option>
                        <option value="claclacla">claclacla</option>
                        <option value="dladladla">dladladla</option>
                    </select>
                </div>
                
                <!--
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="sk_file" class="form-label">Upload SK</label>
                    <input type="file" name="sk_file" class="form-control">
                </div>
                -->
            </div>
            <div class="form-buttons">
                <button type="button" class="cancel" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="submit">Tambah</button>
            </div>
            
        </form>
    </div>
</div>


<div class="modal fade" id="infoLainModal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Pilih Informasi Tambahan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <form id="extraInfoForm">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="kdmp" id="infoKdmp">
                <label class="form-check-label" for="infoKdmp">Tanggal KDMP</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="bandTerakhir" id="infoBand">
                <label class="form-check-label" for="infoBand">Tanggal Band Posisi Terakhir</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="dokumenSk" id="infoSk">
                <label class="form-check-label" for="infoSk">Dokumen SK</label>
            </div>
            <!-- tambahkan pilihan lain sesuai kebutuhan -->
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" id="saveExtraInfo" class="btn btn-primary">Simpan</button>
        </div>
        </div>
    </div>
</div>