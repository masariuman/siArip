import React, { Component } from "react";
import $ from 'jquery';
import Footer from "../../warudo/Footer";
import DarkMode from "../../warudo/DarkMode";
import { Link } from "react-router-dom";
import Loading from "../../warudo/Loading";
import swal from 'sweetalert';
import Pagination from "react-js-pagination";
import Highlighter from "react-highlight-words";
// import { useHistory } from "react-router-dom";


class PnsEdit extends Component {
    constructor(props) {
        super(props);
        this.state = {
            data: [],
            unor: [],
            unorName: "",
            bidang: [],
            bidangName: "",
            subbid: [],
            subbidName: "",
            agama: [],
            agamaUser: "",
            gelarBelakang : "",
            gelarDepan : "",
            nip : "",
            nip9 : "",
            namaLengkap : "",
            tempatLahir : "",
            tanggalLahir : "",
            sashin : "",


            statusKepegawaian : [],
            statusKepegawaianText : "",
            skCpns : "",
            tanggalSkCpns : "",
            tmtCpns : "",
            pejabatPenetapCpns : "",
            skPns : "",
            tanggalSkPns : "",
            tmtPns : "",
            nomorSttpl : "",
            tanggalSttpl : "",
            nomorSpmt : "",
            tanggalSpmt : "",
            nomorPertekC2th : "",
            tanggalPertekC2th : "",
            nomorSkd : "",
            tanggalSkd : "",
            karpeg : "",



            dataEditInput: "",
            buttonTambahModal: "",
            cari: "",
            uploader:"",
            uploaderNip:"",
            uploaderSashin:"",
            url: null,
            file: null,
            filePath: null,
            fileUrl: null,
            ubahPetunjukId: "",
            rinku:"",
            loading: false
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleEditInputChange = this.handleEditInputChange.bind(this);
        this.handleEditSubmit = this.handleEditSubmit.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.renderData = this.renderData.bind(this);
        this.handlePageChange = this.handlePageChange.bind(this);
        this.modalTambah = this.modalTambah.bind(this);
        this.modalUbah = this.modalUbah.bind(this);
        this.modalDetail = this.modalDetail.bind(this);
        this.modalUser = this.modalUser.bind(this);
        this.handleChangeCari = this.handleChangeCari.bind(this);


        this.handleChangeNip = this.handleChangeNip.bind(this);
        this.handleChangeNip9 = this.handleChangeNip9.bind(this);

        this.handleChangeStatusKepegawaian = this.handleChangeStatusKepegawaian.bind(this);
        this.handleChangeSkCpns = this.handleChangeSkCpns.bind(this);
        this.handleChangeTanggalSkCpns = this.handleChangeTanggalSkCpns.bind(this);
        this.handleChangeTmtCpns = this.handleChangeTmtCpns.bind(this);
        this.handleChangePejabatPenetapCpns = this.handleChangePejabatPenetapCpns.bind(this);
        this.handleChangeSkPns = this.handleChangeSkPns.bind(this);
        this.handleChangeTanggalSkPns = this.handleChangeTanggalSkPns.bind(this);
        this.handleChangeTmtPns = this.handleChangeTmtPns.bind(this);
        this.handleChangeNomorSttpl = this.handleChangeNomorSttpl.bind(this);
        this.handleChangeTanggalSttpl = this.handleChangeTanggalSttpl.bind(this);
        this.handleChangeNomorSpmt = this.handleChangeNomorSpmt.bind(this);
        this.handleChangeTanggalSpmt = this.handleChangeTanggalSpmt.bind(this);
        this.handleChangeNomorPertekC2th = this.handleChangeNomorPertekC2th.bind(this);
        this.handleChangeTanggalPertekC2th = this.handleChangeTanggalPertekC2th.bind(this);
        this.handleChangeNomorSkd = this.handleChangeNomorSkd.bind(this);
        this.handleChangeTanggalSkd = this.handleChangeTanggalSkd.bind(this);
        this.handleChangeKarpeg = this.handleChangeKarpeg.bind(this);



        this.handleChangeUnor = this.handleChangeUnor.bind(this);
        this.handleChangeBidang = this.handleChangeBidang.bind(this);
        this.handleChangeSubbid = this.handleChangeSubbid.bind(this);
        this.handleChangeTempatLahir = this.handleChangeTempatLahir.bind(this);
        this.handleChangeTanggalLahir = this.handleChangeTanggalLahir.bind(this);


        this.handleChangeFile = this.handleChangeFile.bind(this);
        this.handleButtonFile = this.handleButtonFile.bind(this);
        this.handleTambahButton = this.handleTambahButton.bind(this);
        this.renderSashinDetail = this.renderSashinDetail.bind(this);
    }

    renderSashinDetail() {
        return !this.state.uploaderSashin || this.state.uploaderSashin === "" ? <img alt="" src="/warudo/dist/img/avatar.jpg" /> : <img alt="" src={"/sashin/"+this.state.uploaderSashin} />;
    }


    handleTambahButton(e) {
        this.setState({
            asalSurat: "",
            nomorSurat: "",
            tanggalSurat: "",
            perihal: "",
            tanggalNaik: "",
            tanggalTurun: "",
            kodeBerkas:"",
            file: null,
            filePath: null,
            fileUrl: null,
        });
    }

    handleButtonFile(e) {
        this.refs.fileUploader.click();
        // console.log(e.target.value);
    }

    handleChangeNip(e) {
        this.setState({
            nip: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeNip9(e) {
        this.setState({
            nip9: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeTempatLahir(e) {
        this.setState({
            tempatLahir: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeTanggalLahir(e) {
        this.setState({
            tanggalLahir: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeUnor(e) {
        this.setState({
            unorName: e.target.value
        });
        axios.get(`/admin/referensi/unorBidang/${e.target.value}`).then((response) => {
            // console.log(response);
            this.setState({
                bidang: response.data.data.bidang.data,
                bidangName: response.data.data.bidang.data[0].url,
                subbid: response.data.data.subbid,
                subbidName: response.data.data.subbid[0].rinku,
            });
        });
        // console.log(e.target.value);
    }

    handleChangeBidang(e) {
        this.setState({
            bidangName: e.target.value
        });
        // axios.get(`/admin/referensi/unorBidang/${e.target.value}`).then((response) => {
        //     this.setState({
        //         bidang: response.data.data.data,
        //         bidangName: response.data.data.data[0].url,
        //     });
        // });
        // console.log(e.target.value);
    }

    handleChangeSubbid(e) {
        this.setState({
            subbidName: e.target.value
        });
        // axios.get(`/admin/referensi/unorBidang/${e.target.value}`).then((response) => {
        //     this.setState({
        //         bidang: response.data.data.data,
        //         bidangName: response.data.data.data[0].url,
        //     });
        // });
        // console.log(e.target.value);
    }

    handleChangeFile(e) {
        // console.log(e.target.files[0]);
        this.setState({
            file: e.target.files[0],
            filePath: e.target.value,
            fileUrl: e.target.value,
        });
    }

    handleChangeCari(e) {
        this.setState({
            cari: e.target.value
        });
        axios
            .post(`/admin/pegawai/search`, {
                cari: e.target.value
            })
            .then(response => {
                // console.log(response.data);
                this.setState({
                    data: response.data.data.data,
                    loading: false,
                    activePage: response.data.data.current_page,
                    itemsCountPerPage: response.data.data.per_page,
                    totalItemsCount: response.data.data.total,
                    pageRangeDisplayed: 10
                });
                // console.log(this.state.tag);
            });
    }

    handleDeleteButton(e) {
        axios
            .get(`/kanrisha/masuk/deeta/${e}`)
            .then(response => {
                swal({
                    title: `Yakin ingin menghapus surat dari ${response.data.data.asalSurat} dengan nomor surat ${response.data.data.nomorSurat}`,
                    text: "Kalau Terhapus, Hubungi Admin Untuk Mengembalikan Data yang Terhapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        this.setState({
                            loading: true
                        });
                        axios
                            .delete(`/kanrisha/masuk/deeta/${e}`, {
                                url: this.state.url
                            })
                            .then(response => {
                                this.setState({
                                    data: response.data.data.data,
                                    loading: false
                                });
                                swal("Sukses!", "Data Berhasil Dihapus!", "success");
                                // console.log("from handle sumit", response);
                            })
                            .catch(error => {
                                this.setState({
                                    loading: false
                                });
                                swal("Error!", "Gagal Menghapus Data, Silahkan Hubungi Admin!", "error");
                            });
                    } else {
                      swal("Data Tidak Terhapus!");
                    }
                  });
            })
            .catch(error => {
                swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
            });
    }

    handleDetail(e) {
        let path = `/admin/pegawai/${e}`;
        this.props.history.push(path);
    }

    handleEditButton(e) {
        axios
            .get(`/kanrisha/masuk/deeta/${e}`)
            .then(response => {
                this.setState({
                    asalSurat: response.data.data.asalSurat,
                    nomorSurat: response.data.data.nomorSurat,
                    tanggalSurat: response.data.data.tanggalSurat,
                    perihal: response.data.data.perihal,
                    tanggalNaik: response.data.data.tanggalNaik,
                    tanggalTurun: response.data.data.tanggalTurun,
                    turunKe: response.data.data.subbid.rinku,
                    turunKeName : response.data.data.subbid.asm,
                    kodeBerkas: response.data.data.kodeBerkas,
                    url: e,
                    uploader: response.data.data.uploader,
                    uploaderNip: response.data.data.uploaderNip,
                    uploaderSashin: response.data.data.uploaderSashin,
                    filePath: response.data.data.filePath,
                    fileUrl: response.data.data.filePath,
                    file: null
                });
            })
            .catch(error => {
                swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
            });
    }

    handleChange(e) {
        this.setState({
            create: e.target.value
        });
        // console.log(e.target.value);
    }

    handleEditInputChange(e) {
        this.setState({
            dataEditInput: e.target.value
        });
        // console.log(e.target.value);
    }

    handleSubmit(e) {
        e.preventDefault();
        this.setState({
            loading: true
        });
        const data = new FormData();
        // data.append('file', this.state.file);
        data.append('subbidName', this.state.subbidName);
        data.append('agamaUser', this.state.agamaUser);
        data.append('gelarBelakang', this.state.gelarBelakang);
        data.append('gelarDepan', this.state.gelarDepan);
        data.append('nip', this.state.nip);
        data.append('nip9', this.state.nip9);
        data.append('namaLengkap', this.state.namaLengkap);
        data.append('tempatLahir', this.state.tempatLahir);
        data.append('tanggalLahir', this.state.tanggalLahir);
        axios
            .post("/admin/pegawai", data)
            .then(response => {
                this.setState({
                    data: [response.data.data, ...this.state.data],
                    unorName: "",
                    bidangName: "",
                    subbidName: "",
                    agamaUser: "",
                    gelarBelakang: "",
                    gelarDepan: "",
                    nip: "",
                    nip9: "",
                    namaLengkap: "",
                    tempatLahir: "",
                    tanggalLahir: "",
                    file: null,
                    filePath: null,
                    fileUrl: null,
                    loading: false
                });
                $("#tambahModal").removeClass("in");
                $(".modal-backdrop").remove();
                $('body').removeClass('modal-open');
                $('body').css('padding-right', '');
                $("#tambahModal").hide();
                swal("Sukses!", "Data Baru Berhasil Ditambahkan!", "success");
                // console.log("from handle sumit", response);
            })
            .catch(error => {
                this.setState({
                    loading: false
                });
                swal("Error!", "Gagal Memasukkan Data Baru, Silahkan Hubungi Admin!", "error");
            });
        // console.log(this.state.create);
    }

    handleEditSubmit(e) {
        e.preventDefault();
        this.setState({
            loading: true
        });
        const data = new FormData();
        // data.append('file', this.state.file);
        data.append('gelarBelakang', this.state.gelarBelakang);
        data.append('namaLengkap', this.state.namaLengkap);
        data.append('gelarDepan', this.state.gelarDepan);
        data.append('alamat', this.state.alamat);
        data.append('telepon', this.state.telepon);
        data.append('handphone', this.state.handphone);
        data.append('emailDinas', this.state.emailDinas);
        data.append('emailPribadi', this.state.emailPribadi);
        data.append('nik', this.state.nik);
        data.append('nomorKK', this.state.nomorKK);
        data.append('agamaUser', this.state.agamaUser);
        data.append('lokasiKerja', this.state.lokasiKerja);
        data.append('akta', this.state.akta);
        data.append('npwp', this.state.npwp);
        data.append('tanggalNpwp', this.state.tanggalNpwp);
        data.append('bpjs', this.state.bpjs);
        data.append('karis', this.state.karis);
        data.append('taspen', this.state.taspen);
        data.append('tanggalTaspen', this.state.tanggalTaspen);
        data.append('tapera', this.state.tapera);
        data.append('kppn', this.state.kppn);
        data.append('kelasJabatan', this.state.kelasJabatan);
        data.append('identitasId', this.state.identitasId);
        // console.log(data);
        axios
            .post(`/admin/pegawai/detail/update`, data)
            .then((response) => {
                swal("Sukses!", "Data Berhasil Diubah!", "success");
                this.props.history.push(`/admin/pegawai/${this.props.match.params.url}/detail`);
            })
            .catch(error => {
                this.setState({
                    loading: false
                });
                swal("Error!", "Gagal Mengubah Data, Silahkan Hubungi Admin!", "error");
            });
        // console.log(this.state.create);
    }

    getData() {
        this.setState({
            // loading: true
        });
        axios
            .get(`/admin/pegawai/${this.props.match.params.url}/edit`)
            .then(response => {
                console.log(response);
                this.setState({
                    // data: response.data.data.data,
                    namaLengkap : response.data.data.pegawai.name,
                    nip : response.data.data.pegawai.juugyouinBangou,
                    gelarBelakang : response.data.data.pegawai.gelarBelakang,
                    gelarDepan : response.data.data.pegawai.gelarDepan,
                    sashin : '/sashin/'+response.data.data.pegawai.sashin,
                    // ubahPetunjukId: response.data.data.data[0].rinku,
                    alamat:response.data.data.identitasPegawai.alamat,
                    telepon:response.data.data.identitasPegawai.telepon,
                    handphone:response.data.data.identitasPegawai.handphone,
                    emailDinas:response.data.data.identitasPegawai.emailDinas,
                    emailPribadi:response.data.data.identitasPegawai.emailPribadi,
                    nik:response.data.data.identitasPegawai.nik,
                    nomorKK:response.data.data.identitasPegawai.nomorKK,
                    agamaUser:response.data.data.identitasPegawai.agamaUser,
                    lokasiKerja:response.data.data.identitasPegawai.lokasiKerja,
                    akta:response.data.data.identitasPegawai.akta,
                    npwp:response.data.data.identitasPegawai.npwp,
                    tanggalNpwp:response.data.data.identitasPegawai.tanggalNpwp,
                    bpjs:response.data.data.identitasPegawai.bpjs,
                    karis:response.data.data.identitasPegawai.karis,
                    taspen:response.data.data.identitasPegawai.taspen,
                    tanggalTaspen:response.data.data.identitasPegawai.tanggalTaspen,
                    tapera:response.data.data.identitasPegawai.tapera,
                    kppn:response.data.data.identitasPegawai.kppn,
                    kelasJabatan:response.data.data.identitasPegawai.kelasJabatan,
                    identitasId:response.data.data.identitasPegawai.rinku,

                    gelarDepanText:response.data.data.pegawai.gelarDepanText,
                    gelarBelakangText:response.data.data.pegawai.gelarBelakangText,
                    loading: false,
                    // activePage: response.data.data.current_page,
                    // itemsCountPerPage: response.data.data.per_page,
                    // totalItemsCount: response.data.data.total,
                    // pageRangeDisplayed: 10
                });
                $('#petunjuk').on('click',function() {
                    var enjoyhint_instance = new EnjoyHint({});
                    var enjoyhint_script_steps = [
                    {
                        'next #buttonTambahModal' : 'Untuk Menambah Data Baru, Tekan Tombol Tambah Surat Masuk Baru'
                    },
                    {
                        'next #ubah1' : 'Untuk Mengubah Data, Tekan Tombol Ubah Berikut'
                    },
                    {
                        'next #hapus1' : 'Untuk Menghapus Data, Tekan Hapus Berikut'
                    },
                    {
                        'next #detail1' : 'Untuk Menghapus Data, Tekan Hapus Berikut'
                    },
                    {
                        'next #downloadButton' : "Apabila Anda Ada Melakukan Upload Data Ketika Menambahkan Data Baru <br> Atau Mengubah Data Baru, Maka Akan Muncul <br> Tombol <button class='mr-2 mb-2 btn btn-outline-secondary'>Download</button> Yang Dapat Digunakan Untuk Mendownload/Mengunduh Data"
                    },
                    {
                        'next #pagination' : 'Untuk Melihat Data Berikutnya, Pilih Pada Angka Berikut Untuk Melihat Data Pada Halaman Selanjutnya'
                    },
                    {
                        'next #cari' : 'Untuk Mencari Data, Ketikkan Pada Kolom Berikut Dan Tunggu Hasilnya Keluar'
                    },
                    {
                        'next #userSetting' : "Arahkan Mouse Kesini Untuk Membuka Menu Pengaturan User. <br /><br /> <img src='/petunjuk/userSetting.png' class='masariuman_imgUserSetting' /> <br /><br /> Anda Dapat Mengubah Password Dan Mengubah Foto Profil Anda Dengan Menekan Tombol Pengaturan User Untuk Membuka Form <br /> Untuk Mengubah Data Password Atau Foto Profil Anda. <br/> <br/> Untuk Keluar Dari Aplikasi, Anda Dapat Menekan Tombol Logout."
                    },
                    {
                        'next #meno' : 'Pilih Menu Pada Panel Berikut Untuk Membuka Halaman Sesuai Dengan Menu Yang Dipilih.'
                    }
                    ];
                    enjoyhint_instance.set(enjoyhint_script_steps);
                    enjoyhint_instance.run();
                });
            })
            .catch(error => {
                swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
                this.setState({loading: false});
            });
    }

    getSubbid() {
        // axios.get("/kanrisha/masuk/deeta/create").then((response) => {
        //     this.setState({
        //         subbid: response.data.data,
        //         turunKe: response.data.data[0].rinku,
        //     });
        // });
    }

    getAgama() {
        axios.get("/admin/referensi/agama/create").then((response) => {
            this.setState({
                agama: response.data.data,
                agamaUser: response.data.data[0].rinku,
            });
        });
    }

    getUnor() {
        axios.get("/admin/referensi/unorBidang").then((response) => {
            this.setState({
                unor: response.data.data.unor,
                unorName: response.data.data.unor[0].rinku,
                bidang: response.data.data.bidang,
                unorName: response.data.data.bidang[0].rinku,
                subbid: response.data.data.subbid,
                subbidName: response.data.data.subbid[0].rinku,
            });
        });
    }

    handlePageChange(pageNumber) {
        this.setState({
            loading: true
        });
        axios
            .get('/kanrisha/masuk/deeta?page='+pageNumber)
            .then(response => {
                this.setState({
                    data: response.data.data.data,
                    loading: false,
                    activePage: response.data.data.current_page,
                    itemsCountPerPage: response.data.data.per_page,
                    totalItemsCount: response.data.data.total,
                    pageRangeDisplayed: 10
                });
            })
            .catch(error => {
                swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
                this.setState({loading: false});
            });
    }

    componentDidMount() {
        // this.getAgama();
        this.getData();
    }

    componentDidUpdate() {
        // this.getTag();
    }

    renderData() {
        return (
            <tbody>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Gelar Depan
                    </td>
                    <td className="masariuman_tdContent">
                        <div className="col-sm-12">
                            <div className="form-group">
                                <input
                                    onChange={this.handleChangeGelarDepan}
                                    value={this.state.gelarDepan}
                                    title="Gelar Depan"
                                    placeholder="Gelar Depan..."
                                    type="text"
                                    className="form-control"
                                />
                            </div>
                        </div>
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nama
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.namaLengkap}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Gelar Belakang
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.gelarBelakang}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        NIP
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.nip}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Alamat Domisili
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.alamat}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor Telepon
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.telepon}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor Handphone
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.handphone}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Email Dinas
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.emailDinas}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Email Pribadi
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.emailPribadi}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        NIK
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.nik}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor KK
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.nomorKK}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Agama
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.agamaUser}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Lokasi Kerja (Setingkat Kecamatan)
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.lokasiKerja}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor Akta Kelahiran
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.akta}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor NPWP
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.npwp}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Tanggal NPWP
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.tanggalNpwp}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor BPJS / Kartu Indonesia Sehat
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.bpjs}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor Karis / Karsu
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.karis}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor TASPEN
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.taspen}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Tanggal TASPEN
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.tanggalTaspen}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Nomor TAPERA
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.taspen}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        KPPN/Kantor Pembayaran Gaji
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.kppn}
                    </td>
                </tr>
                <tr className="masariuman_table">
                    <td className="masariuman_tdTitle">
                        Kelas Jabatan (angka)
                    </td>
                    <td className="masariuman_tdContent">
                        {this.state.kelasJabatan}
                    </td>
                </tr>
            </tbody>
            );
    }

    renderSelect() {
        // return this.state.subbid.map((data) => (
        //     <option value={data.rinku} key={data.rinku}>
        //         {data.asm}
        //     </option>
        // ));
    }

    renderSelectAgama() {
        return this.state.agama.map((data) => (
            <option value={data.rinku} key={data.rinku}>
                {data.name}
            </option>
        ));
    }

    renderSelectStatusKepegawaian() {
        return this.state.agama.map((data) => (
            <option value={data.rinku} key={data.rinku}>
                {data.name}
            </option>
        ));
    }


    renderSelectUnor() {
        return this.state.unor.map((data) => (
            <option value={data.rinku} key={data.rinku}>
                {data.name}
            </option>
        ));
    }

    renderSelectBidang() {
        return this.state.bidang.map((data) => (
            <option value={data.rinku} key={data.rinku}>
                {data.name}
            </option>
        ));
    }

    renderSelectSubbid() {
        return this.state.subbid.map((data) => (
            <option value={data.rinku} key={data.rinku}>
                {data.name}
            </option>
        ));
    }

    modalTambah() {
        // console.log(this.state.agama);
        return (
            <div aria-hidden="true" className="onboarding-modal modal fade animated" id="tambahModal" role="dialog" tabIndex="-1">
                <div className="modal-dialog modal-lg modal-centered" role="document">
                    <div className="modal-content text-center">
                    <button aria-label="Close" className="close" data-dismiss="modal" type="button"><span className="close-label">Tutup</span><span className="os-icon os-icon-close"></span></button>
                    <div className="onboarding-side-by-side">
                        <div className="onboarding-media">
                        <img alt="" src="/iconModal/mailPlus.png" width="200px" />
                        </div>
                        <div className="onboarding-content with-gradient masariuman_width100percent">
                        <h4 className="onboarding-title">
                            Tambah Data Pegawai
                        </h4>

                        <form onSubmit={this.handleSubmit}>
                            <div className="row">
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeNip}
                                        value={this.state.nip}
                                        title="NIP"
                                        placeholder="NIP..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeNip9}
                                        value={this.state.nip9}
                                        title="Nomor Surat"
                                        placeholder="NIP 9..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-3">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeGelarDepan}
                                        value={this.state.gelarDepan}
                                        title="Nomor Surat"
                                        placeholder="Gelar Depan..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeNamaLengkap}
                                        value={this.state.namaLengkap}
                                        title="Nomor Surat"
                                        placeholder="Nama Lengkap..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-3">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeGelarBelakang}
                                        value={this.state.gelarBelakang}
                                        title="Nomor Surat"
                                        placeholder="Gelar Belakang..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-5">
                                <div className="form-group">
                                    Tempat & Tanggal lahir :
                                </div>
                            </div>
                            <div className="col-sm-3">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTempatLahir}
                                        value={this.state.tempatLahir}
                                        title="Tempat lahir"
                                        placeholder="Tempat Lahir..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-4">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTanggalLahir}
                                        value={this.state.tanggalLahir}
                                        title="Tanggal Lahir"
                                        placeholder="Tanggal Lahir.."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-4">
                                <div className="form-group">
                                    Agama :
                                </div>
                            </div>
                            <div className="col-sm-8">
                                <div className="form-group">
                                    <select
                                        value={this.state.agamaUser}
                                        onChange={this.handleChangeAgama}
                                        className="form-control"
                                    >
                                        {this.renderSelectAgama()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-4">
                                <div className="form-group">
                                    Unit Kerja :
                                </div>
                            </div>
                            <div className="col-sm-8">
                                <div className="form-group">
                                    <select
                                        value={this.state.unorName}
                                        onChange={this.handleChangeUnor}
                                        className="form-control"
                                    >
                                        {this.renderSelectUnor()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-4">
                                <div className="form-group">
                                    Bidang :
                                </div>
                            </div>
                            <div className="col-sm-8">
                                <div className="form-group">
                                    <select
                                        value={this.state.bidangName}
                                        onChange={this.handleChangeBidang}
                                        className="form-control"
                                    >
                                        {this.renderSelectBidang()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-4">
                                <div className="form-group">
                                    Sub Bidang :
                                </div>
                            </div>
                            <div className="col-sm-8">
                                <div className="form-group">
                                    <select
                                        value={this.state.subbidName}
                                        onChange={this.handleChangeSubbid}
                                        className="form-control"
                                    >
                                        {this.renderSelectSubbid()}
                                    </select>
                                </div>
                            </div>
                            {/* <div className="col-sm-4">
                                <div className="form-group">
                                    Jenis Jabatan :
                                </div>
                            </div>
                            <div className="col-sm-8">
                                <div className="form-group">
                                    <select
                                        value={this.state.turunKe}
                                        onChange={this.handleChangeTurunKe}
                                        className="form-control"
                                    >
                                        {this.renderSelect()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-4">
                                <div className="form-group">
                                    Nama Jabatan :
                                </div>
                            </div>
                            <div className="col-sm-8">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeKodeBerkas}
                                        value={this.state.kodeBerkas}
                                        title="Nama Jabatan"
                                        placeholder="Nama Jabatan.."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-5">
                                <div className="form-group">
                                    TMT. Jabatan :
                                </div>
                            </div>
                            <div className="col-sm-7">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTanggalSurat}
                                        value={this.state.tanggalSurat}
                                        title="Tanggal Surat"
                                        placeholder="Tanggal Surat.."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeKodeBerkas}
                                        value={this.state.kodeBerkas}
                                        title="Kode Berkas"
                                        placeholder="Kode Berkas.."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div> */}
                            {/* <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeFile}
                                        title="File"
                                        placeholder="File.."
                                        type="file"
                                        className="form-control masariuman_displayNone"
                                        ref="fileUploader"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <table className="masariuman_tableFile">
                                    <tbody>
                                        <tr>
                                            <td className="masariuman_width110px">
                                                <button className="mr-2 mb-2 btn btn-primary" type="button" onClick={this.handleButtonFile} >Upload Foto</button>
                                            </td>
                                            <td className="form-group">
                                                <a target="_blank" href={this.state.fileUrl}>{this.state.filePath}</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> */}
                            <div className="col-sm-12">
                                <div className="form-group text-center">
                                    <button className="mr-2 mb-2 btn btn-primary" data-target="#onboardingWideFormModal" data-toggle="modal" type="submit">Tambah Pegawai Baru</button>
                                </div>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        );
    }

    modalUbah() {
        return (
            <div aria-hidden="true" className="onboarding-modal modal fade animated" id="editModal" role="dialog" tabIndex="-1">
                {/* <div className="modal-dialog modal-lg modal-centered" role="document">
                    <div className="modal-content text-center">
                    <button aria-label="Close" className="close" data-dismiss="modal" type="button"><span className="close-label">Tutup</span><span className="os-icon os-icon-close"></span></button>
                    <div className="onboarding-side-by-side">
                        <div className="onboarding-media">
                        <img alt="" src="/iconModal/mailEdit.png" width="200px" />
                        </div>
                        <div className="onboarding-content with-gradient masariuman_width100percent">
                        <h4 className="onboarding-title">
                            Ubah Data Pegawai
                        </h4>
                        <form onSubmit={this.handleEditSubmit}>
                            <div className="row">
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeAsalSurat}
                                        value={this.state.asalSurat}
                                        title="Asal Surat"
                                        placeholder="Asal Surat.."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeNomorSurat}
                                        value={this.state.nomorSurat}
                                        title="Nomor Surat"
                                        placeholder="Nomor Surat.."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <table className="masariuman_tableLabelTanggal">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Tanggal Surat :
                                            </td>
                                            <td className="form-group">
                                                <input
                                                    onChange={this.handleChangeTanggalSurat}
                                                    value={this.state.tanggalSurat}
                                                    title="Tanggal Surat"
                                                    placeholder="Tanggal Surat.."
                                                    type="date"
                                                    className="form-control"
                                                />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <textarea
                                        onChange={this.handleChangePerihal}
                                        value={this.state.perihal}
                                        title="Perihal Surat"
                                        placeholder="Perihal Surat.."
                                        className="form-control"
                                        rows="3" />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                Tanggal Surat Naik Ke Kepala :
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTanggalNaik}
                                        value={this.state.tanggalNaik}
                                        title="Tanggal Surat Naik Ke Kepala"
                                        placeholder="Tanggal Surat Naik Ke Kepala.."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <select
                                        value={this.state.turunKe}
                                        onChange={this.handleChangeTurunKe}
                                        className="form-control"
                                    >
                                        {this.renderSelect()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <table className="masariuman_tableLabelTanggal">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Tanggal Surat Turun :
                                            </td>
                                            <td className="form-group">
                                                <input
                                                    onChange={this.handleChangeTanggalTurun}
                                                    value={this.state.tanggalTurun}
                                                    title="Tanggal Surat"
                                                    placeholder="Tanggal Surat.."
                                                    type="date"
                                                    className="form-control"
                                                />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeKodeBerkas}
                                        value={this.state.kodeBerkas}
                                        title="Kode Berkas"
                                        placeholder="Kode Berkas.."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeFile}
                                        title="File"
                                        placeholder="File.."
                                        type="file"
                                        className="form-control masariuman_displayNone"
                                        ref="fileUploader"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <table className="masariuman_tableFile">
                                    <tbody>
                                        <tr>
                                            <td className="masariuman_width110px">
                                                <button className="mr-2 mb-2 btn btn-warning" type="button" onClick={this.handleButtonFile} >Upload File Baru</button>
                                            </td>
                                            <td className="form-group">
                                                <a target="_blank" href={this.state.fileUrl}>{this.state.filePath}</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group text-center">
                                    <button className="mr-2 mb-2 btn btn-warning" data-target="#onboardingWideFormModal" data-toggle="modal" type="submit">Ubah Data Pegawai</button>
                                </div>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div> */}
            </div>
        );
    }

    modalDetail() {
        return (
            <div aria-hidden="true" className="onboarding-modal modal fade animated" id="detailModal" role="dialog" tabIndex="-1">
                {/* <div className="modal-dialog modal-lg modal-centered" role="document">
                    <div className="modal-content">
                    <button aria-label="Close" className="close" data-dismiss="modal" type="button"><span className="close-label">Tutup</span><span className="os-icon os-icon-close"></span></button>
                    <div className="onboarding-side-by-side">
                        <div className="onboarding-media">
                        <img alt="" src="/iconModal/mail.png" width="200px" />
                        </div>
                        <div className="onboarding-content with-gradient masariuman_width100percent">
                        <h4 className="onboarding-title text-center">
                            Detail Data
                        </h4>
                            <div className="row">
                                <div className="col-sm-12">
                                    <div className="table-responsive">
                                        <table className="masariuman_tableLabelTanggal table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Asal Surat
                                                    </td>
                                                    <td className="titikDua">
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.asalSurat}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Nomor Surat
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.nomorSurat}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tanggal Surat
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.tanggalSurat}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Perihal Surat
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.perihal}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tanggal Surat Naik Ke Kepala
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.tanggalNaik}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Turun Ke Bidang
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.turunKeName}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Tanggal Surat Turun
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.tanggalTurun}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Kode Berkas
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.kodeBerkas}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Oleh
                                                    </td>
                                                    <td>
                                                        :
                                                    </td>
                                                    <td className="form-group masariuman_tdwarp">
                                                        {this.state.uploader} &nbsp;&nbsp;<button data-target="#detailUserModal" data-toggle="modal" className="mr-2 mb-2 btn btn-success" type="button">Info</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {this.state.filePath ? (
                                        <a href={`/zaFail/${this.state.filePath}`} className="mr-2 mb-2 btn btn-outline-secondary masariuman_width100percent">Download File</a>
                                    ) : (
                                        <span></span>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div> */}
            </div>
        );
    }

    modalUser() {
        return (
            <div aria-hidden="true" className="onboarding-modal modal fade animated" id="detailUserModal" role="dialog" tabIndex="-1">
                <div className="modal-dialog modal-centered" role="document">
                    <div className="modal-content text-center">
                        <button aria-label="Close" className="close" data-dismiss="modal" type="button"><span className="os-icon os-icon-close"></span></button>
                        <div className="onboarding-media">
                            <img alt="" src="img/bigicon5.png" width="200px" />
                        </div>
                        <div className="onboarding-content with-gradient">
                            <h4 className="onboarding-title">
                                Informasi User
                            </h4>
                            <div className="onboarding-text">
                                <table className="masariuman_width100percent">
                                    <tbody>
                                        <tr>
                                            <td className="text-center">
                                                <b>{this.renderSashinDetail()}</b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="masariuman_namaNip">
                                                {this.state.uploader}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td className="masariuman_namaNip">
                                                NIP. {this.state.uploaderNip}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

    render() {
        return (
            this.state.loading === true ? <Loading /> :
            <div className="content-w">
                {/* title content */}
                <div className="top-bar color-scheme-transparent masariuman-height103px">
                    <div className="top-menu-controls masariuman-marginleft30px">
                        <div className="icon-w top-icon masariuman-titlecontent">
                        <div className="os-icon os-icon-user"></div>
                        </div>
                        <div className="masariuman-textleft">
                            <span className="masariuman-bold">{this.state.namaLengkap}</span> <br/>
                            <small>{this.state.nip}</small>
                        </div>
                    </div>
                    <div className="top-menu-controls">
                        <button className="mr-2 mb-2 btn btn-outline-primary" type="button" id="petunjuk"><i className="batch-icon-bulb-2"></i> PETUNJUK <i className="batch-icon-bulb"></i></button>
                    </div>
                </div>
                <ul className="breadcrumb">
                    <li className="breadcrumb-item">
                        <a>Pegawai</a>
                    </li>
                    <li className="breadcrumb-item">
                        <span>Manajemen pegawai</span>
                    </li>
                </ul>

                {/* content */}
                <div className="content-i masariuman-minheight100vh">
                        <div className="content-box">
                            <div className="element-wrapper">
                                {/* content here */}
                                <div className="row">
                                    <div className="col-md-4">
                                        <div className="element-box masariuman_leftSide">
                                            <div className="masariuman_foto">
                                                <img className="masariuman_width220px" alt="" src={this.state.sashin} />
                                            </div>
                                            <div>
                                                <span className="masariuman-bold">{this.state.gelarDepan + this.state.namaLengkap + this.state.gelarBelakang}</span> <br/>
                                                <small>NIP. {this.state.nip}</small>
                                            </div>
                                            <br />
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/arsip`}
                                                    className="btn-transition btn btn-shadow btn-outline-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> Arsip
                                                </Link>
                                            </div>
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/pengajuan`}
                                                    className="btn-transition btn btn-shadow btn-outline-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> Pengajuan
                                                </Link>
                                            </div>
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/detail`}
                                                    className="btn-transition btn btn-shadow btn-outline-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> Identitas
                                                </Link>
                                            </div>
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/cpns`}
                                                    className="btn-transition btn btn-shadow btn-outline-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> CPNS
                                                </Link>
                                            </div>
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/pns`}
                                                    className="btn btn-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> PNS
                                                </Link>
                                            </div>
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/pangkatAkhir`}
                                                    className="btn-transition btn btn-shadow btn-outline-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> Pangkat Akhir
                                                </Link>
                                            </div>
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/jabatanAkhir`}
                                                    className="btn-transition btn btn-shadow btn-outline-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> Jabatan Akhir
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                        <div className="col-md-8">
                                            <div className="element-box">
                                                <div className="masariuman_marginBottom50px">
                                                    <div className="float-left">
                                                        <h5 className="form-header">
                                                            Ubah Data CPNS/PNS
                                                        </h5>
                                                    </div>
                                                    <div className="float-right">
                                                        <button type='button' className="mr-2 mb-2 btn btn-success" onClick={this.handleEditSubmit}>
                                                            Simpan Perubahan Data CPNS/PNS
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr/>



                                                <div className="table-responsive" id="ruanganTable">
                                                    {/* <table id="tabeldata" width="100%" className="table table-striped table-lightfont">
                                                        {this.renderData()}
                                                    </table> */}
                                                    <div className="row">
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Status Kepegawaian
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <select
                                                                value={this.state.statusKepegawaianText}
                                                                onChange={this.handleChangeStatusKepegawaian}
                                                                className="form-control"
                                                            >
                                                                {this.renderSelectStatusKepegawaian()}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Surat Keputusan CPNS
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeSkCpns}
                                                                value={this.state.skCpns}
                                                                title="Nomor Surat Keputusan CPNS"
                                                                placeholder="Nomor Surat Keputusan CPNS..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal Surat keputusan CPNS
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTanggalSkCpns}
                                                                value={this.state.tanggalSkCpns}
                                                                title="Tanggal Surat keputusan CPNS"
                                                                placeholder="Tanggal Surat keputusan CPNS..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal Mulai Tugas (TMT) CPNS
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTmtCpns}
                                                                value={this.state.tmtCpns}
                                                                title="Tanggal Mulai Tugas (TMT) CPNS"
                                                                placeholder="Tanggal Mulai Tugas (TMT) CPNS..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nama Pejabat Penetap CPNS
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangePejabatPenetapCpns}
                                                                value={this.state.pejabatPenetapCpns}
                                                                title="Nama Pejabat Penetap CPNS"
                                                                placeholder="Nama Pejabat Penetap CPNS..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Surat Keputusan PNS
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeSkPns}
                                                                value={this.state.skPns}
                                                                title="Nomor Surat Keputusan PNS"
                                                                placeholder="Nomor Surat Keputusan PNS..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal Surat Keputusan PNS
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTanggalSkPns}
                                                                value={this.state.tanggalSkPns}
                                                                title="Tanggal Surat Keputusan PNS"
                                                                placeholder="Tanggal Surat Keputusan PNS..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal Mulai Tugas (TMT) PNS
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTmtPns}
                                                                value={this.state.tmtPns}
                                                                title="Tanggal Mulai Tugas (TMT) PNS"
                                                                placeholder="Tanggal Mulai Tugas (TMT) PNS..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor STTPL
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeNomorSttpl}
                                                                value={this.state.nomorSttpl}
                                                                title="Nomor STTPL"
                                                                placeholder="Nomor STTPL..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal STTPL
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTanggalSttpl}
                                                                value={this.state.tanggalSttpl}
                                                                title="Tanggal STTPL"
                                                                placeholder="Tanggal STTPL..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor SPMT
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeNomorSpmt}
                                                                value={this.state.nomorSpmt}
                                                                title="Nomor SPMT"
                                                                placeholder="Nomor SPMT..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal SPMT
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTanggalSpmt}
                                                                value={this.state.tanggalSpmt}
                                                                title="Tanggal SPMT"
                                                                placeholder="Tanggal SPMT..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Pertek C2TH
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeNomorPertekC2th}
                                                                value={this.state.nomorPertekC2th}
                                                                title="Nomor Pertek C2TH"
                                                                placeholder="Nomor Pertek C2TH..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal Pertek C2TH
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTanggalPertekC2th}
                                                                value={this.state.tanggalPertekC2th}
                                                                title="Tanggal Pertek C2TH"
                                                                placeholder="Tanggal Pertek C2TH..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Surat Keterangan Dokter
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeNomorSkd}
                                                                value={this.state.nomorSkd}
                                                                title="Nomor Surat Keterangan Dokter"
                                                                placeholder="Nomor Surat Keterangan Dokter..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal Surat Keterangan Dokter
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTanggalSkd}
                                                                value={this.state.tanggalSkd}
                                                                title="Tanggal Surat Keterangan Dokter"
                                                                placeholder="Tanggal Surat Keterangan Dokter..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Karpeg
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeKarpeg}
                                                                value={this.state.karpeg}
                                                                title="Karpeg"
                                                                placeholder="Karpeg..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>



                                                <br />
                                                <div className="form-desc text-center">
                                                    <button type="button" className="mr-2 mb-2 btn btn-success" onClick={this.handleEditSubmit}>
                                                        Simpan Perubahan Data CPNS/PNS
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                                {/* end content here */}
                            </div>
                            <DarkMode />
                        </div>
                    </div>
                <Footer />
                {this.modalTambah()}
                {this.modalUbah()}
                {this.modalDetail()}
                {this.modalUser()}
            </div>
        );
    }










    handleChangeStatusKepegawaian(e) {
        this.setState({
            statusKepegawaianText: e.target.value
        });
        // console.log(e.target.value);
    }
    handleChangeSkCpns(e) {
        this.setState({
            skCpns: e.target.value
        });
        // console.log(e.target.value);
    }
    handleChangeTanggalSkCpns(e) {
        this.setState({
            tanggalSkCpns: e.target.value
        });
        // console.log(e.target.value);
    }
    handleChangeTmtCpns(e) {
        this.setState({
            tmtCpns: e.target.value
        });
    }
    handleChangePejabatPenetapCpns(e) {
        this.setState({
            pejabatPenetapCpns: e.target.value
        });
    }
    handleChangeSkPns(e) {
        this.setState({
            skPns: e.target.value
        });
    }
    handleChangeTanggalSkPns(e) {
        this.setState({
            tanggalSkPns: e.target.value
        });
    }
    handleChangeTmtPns(e) {
        this.setState({
            tmtPns: e.target.value
        });
    }
    handleChangeNomorSttpl(e) {
        this.setState({
            nomorSttpl: e.target.value
        });
    }
    handleChangeTanggalSttpl(e) {
        this.setState({
            tanggalSttpl: e.target.value
        });
    }
    handleChangeNomorSpmt(e) {
        this.setState({
            nomorSpmt: e.target.value
        });
    }
    handleChangeTanggalSpmt(e) {
        this.setState({
            tanggalSpmt: e.target.value
        });
    }
    handleChangeNomorPertekC2th(e) {
        this.setState({
            nomorPertekC2th: e.target.value
        });
    }
    handleChangeTanggalPertekC2th(e) {
        this.setState({
            tanggalPertekC2th: e.target.value
        });
    }
    handleChangeNomorSkd(e) {
        this.setState({
            nomorSkd: e.target.value
        });
    }
    handleChangeTanggalSkd(e) {
        this.setState({
            tanggalSkd: e.target.value
        });
    }
    handleChangeKarpeg(e) {
        this.setState({
            karpeg: e.target.value
        });
    }

}

export default PnsEdit;
