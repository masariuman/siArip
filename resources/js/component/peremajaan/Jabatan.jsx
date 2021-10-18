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


class Jabatan extends Component {
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
            kategori: [],
            kategoriName : "",
            name : "",
            keterangan : "",
            arsip: [],

            pegawai_id : "",
            pangkat : [],
            pangkat_id : "",
            jenisNaikPangkat_id : "",
            jenisNaikPangkat : [],
            masaKerjaGolonganTahun : "",
            masaKerjaGolonganBulan : "",
            tmtGolongan : "",
            nomorSk : "",
            tanggalSk : "",
            nomorPertek : "",
            tanggalPertek : "",

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

        this.handleChangeAgama = this.handleChangeAgama.bind(this);
        this.handleChangeKategori = this.handleChangeKategori.bind(this);
        this.handleChangeName = this.handleChangeName.bind(this);
        this.handleChangeKeterangan = this.handleChangeKeterangan.bind(this);

        this.handleChangeGolongan = this.handleChangeGolongan.bind(this);
        this.handleChangeJenisKenaikanPangkat = this.handleChangeJenisKenaikanPangkat.bind(this);
        this.handleChangeMasaKerjaGolonganTahun = this.handleChangeMasaKerjaGolonganTahun.bind(this);
        this.handleChangeMasaKerjaGolonganBulan = this.handleChangeMasaKerjaGolonganBulan.bind(this);
        this.handleChangeTmtGolongan = this.handleChangeTmtGolongan.bind(this);
        this.handleChangeNomorSK = this.handleChangeNomorSK.bind(this);
        this.handleChangeTanggalSK = this.handleChangeTanggalSK.bind(this);
        this.handleChangeNomorPertek = this.handleChangeNomorPertek.bind(this);
        this.handleChangeTanggalPertek = this.handleChangeTanggalPertek.bind(this);


        this.handleChangeNip = this.handleChangeNip.bind(this);
        this.handleChangeNip9 = this.handleChangeNip9.bind(this);
        this.handleChangeGelarDepan = this.handleChangeGelarDepan.bind(this);
        this.handleChangeNamaLengkap = this.handleChangeNamaLengkap.bind(this);
        this.handleChangeGelarBelakang = this.handleChangeGelarBelakang.bind(this);
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

    handleChangeAgama(e) {
        this.setState({
            agamaUser: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeKategori(e) {
        this.setState({
            kategoriName: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeGolongan(e) {
        this.setState({
            pangkat_id: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeJenisKenaikanPangkat(e) {
        this.setState({
            jenisNaikPangkat_id: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeMasaKerjaGolonganTahun(e) {
        this.setState({
            masaKerjaGolonganTahun: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeMasaKerjaGolonganBulan(e) {
        this.setState({
            masaKerjaGolonganBulan: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeTmtGolongan(e) {
        this.setState({
            tmtGolongan: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeNomorSK(e) {
        this.setState({
            nomorSk: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeTanggalSK(e) {
        this.setState({
            tanggalSk: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeNomorPertek(e) {
        this.setState({
            nomorPertek: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeTanggalPertek(e) {
        this.setState({
            tanggalPertek: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeName(e) {
        this.setState({
            name: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeKeterangan(e) {
        this.setState({
            keterangan: e.target.value
        });
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

    handleChangeGelarBelakang(e) {
        this.setState({
            gelarBelakang: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeGelarDepan(e) {
        this.setState({
            gelarDepan: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeNamaLengkap(e) {
        this.setState({
            namaLengkap: e.target.value
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
            .post(`/admin/pegawai/arsip/search`, {
                cari: e.target.value,
                pegawai_id: this.props.match.params.url
            })
            .then(response => {
                console.log(response.data.data.data);
                this.setState({
                    arsip: response.data.data.data,
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
            .get(`/admin/pegawai/pangkat/${e}/edit`)
            .then(response => {
                swal({
                    title: `Yakin ingin menghapus pangkat ${response.data.data.golongan.name} ( ${response.data.data.golongan.pangkat} )?`,
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
                            .delete(`/admin/pegawai/pangkat/${e}`, {
                                url: e
                            })
                            .then(response => {
                                this.setState({
                                    data : response.data.data.pangkat.data,
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

    handleAktifButton(e) {
        axios
            .get(`/admin/pegawai/pangkat/${e}/edit`)
            .then(response => {
                swal({
                    title: `Yakin ingin mengaktifkan pangkat ${response.data.data.golongan.name} ( ${response.data.data.golongan.pangkat} ) sebagai pangkat sekarang ?`,
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
                            .post(`/admin/pegawai/pangkat/aktif/${e}`, {
                                url: e
                            })
                            .then(response => {
                                this.setState({
                                    data : response.data.data.pangkat.data,
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
            .get(`/admin/pegawai/pangkat/${e}/edit`)
            .then(response => {
                // console.log(response);
                this.setState({
                    pangkat_id : response.data.data.golongan.rinku,
                    jenisNaikPangkat_id : response.data.data.jenisNaikPangkat.rinku,
                    masaKerjaGolonganTahun : response.data.data.pangkat.masaKerjaGolonganTahun,
                    masaKerjaGolonganBulan : response.data.data.pangkat.masaKerjaGolonganBulan,
                    tmtGolongan : response.data.data.pangkat.tmtGolongan,
                    nomorSk : response.data.data.pangkat.nomorSk,
                    tanggalSk : response.data.data.pangkat.tanggalSk,
                    nomorPertek : response.data.data.pangkat.nomorPertek,
                    tanggalPertek : response.data.data.pangkat.tanggalPertek,

                    loading: false,
                    url: e,
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
        data.append('pangkat_id', this.state.pangkat_id);
        data.append('jenisNaikPangkat_id', this.state.jenisNaikPangkat_id);
        data.append('masaKerjaGolonganTahun', this.state.masaKerjaGolonganTahun);
        data.append('masaKerjaGolonganBulan', this.state.masaKerjaGolonganBulan);
        data.append('tmtGolongan', this.state.tmtGolongan);
        data.append('nomorSk', this.state.nomorSk);
        data.append('tanggalSk', this.state.tanggalSk);
        data.append('nomorPertek', this.state.nomorPertek);
        data.append('tanggalPertek', this.state.tanggalPertek);
        data.append('pegawai_id', this.props.match.params.url);
        axios
            .post(`/admin/pegawai/pangkat`, data)
            .then(response => {
                console.log(response);
                this.setState({
                    data: [response.data.data.data, ...this.state.data],
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
        data.append('pangkat_id', this.state.pangkat_id);
        data.append('jenisNaikPangkat_id', this.state.jenisNaikPangkat_id);
        data.append('masaKerjaGolonganTahun', this.state.masaKerjaGolonganTahun);
        data.append('masaKerjaGolonganBulan', this.state.masaKerjaGolonganBulan);
        data.append('tmtGolongan', this.state.tmtGolongan);
        data.append('nomorSk', this.state.nomorSk);
        data.append('tanggalSk', this.state.tanggalSk);
        data.append('nomorPertek', this.state.nomorPertek);
        data.append('tanggalPertek', this.state.tanggalPertek);
        data.append('url', this.state.url);
        axios
            .post(`/admin/pegawai/pangkat/update`, data)
            .then(response => {
                // console.log(response);
                this.setState({
                    data : response.data.data.pangkat.data,
                    file: null,
                    filePath: null,
                    fileUrl: null,
                    loading: false
                });
                $("#editModal").removeClass("in");
                $(".modal-backdrop").remove();
                $('body').removeClass('modal-open');
                $('body').css('padding-right', '');
                $("#editModal").hide();
                swal("Sukses!", "Data Berhasil Diubah!", "success");
                // console.log("from handle sumit", response);
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
            .get(`/admin/pegawai/pangkat/${this.props.match.params.url}`)
            .then(response => {
                // console.log(response);
                this.setState({
                    // data: response.data.data.data,
                    namaLengkap : response.data.data.pegawai.name,
                    nip : response.data.data.pegawai.juugyouinBangou,
                    gelarBelakang : response.data.data.pegawai.gelarBelakang,
                    gelarDepan : response.data.data.pegawai.gelarDepan,
                    data : response.data.data.pangkat.data,
                    sashin : '/sashin/'+response.data.data.pegawai.sashin,
                    // ubahPetunjukId: response.data.data.data[0].rinku,
                    loading: false,
                    activePage: response.data.data.pangkat.current_page,
                    itemsCountPerPage: response.data.data.pangkat.per_page,
                    totalItemsCount: response.data.data.pangkat.total,
                    pageRangeDisplayed: 10
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

    getKategori() {
        axios.get("/admin/referensi/kategoriArsip/create").then((response) => {
            this.setState({
                kategori: response.data.data,
                kategoriName: response.data.data[0].rinku,
            });
        });
    }

    getGolongan() {
        axios.get("/admin/referensi/pangkatGolonganRuang/create").then((response) => {
            this.setState({
                pangkat: response.data.data,
                pangkat_id: response.data.data[0].rinku,
            });
        });
    }

    getJenisKenaikanPangkat() {
        axios.get("/admin/referensi/jenisNaikPangkat/create").then((response) => {
            this.setState({
                jenisNaikPangkat: response.data.data,
                jenisNaikPangkat_id: response.data.data[0].rinku,
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
            .get(`/admin/pegawai/pangkat/${this.props.match.params.url}?page=${pageNumber}`)
            .then(response => {
                console.log(response);
                this.setState({
                    // arsip : response.data.data.arsip.data,
                    // data: response.data.data.arsip.data,
                    data : response.data.data.pangkat.data,
                    // ubahPetunjukId: response.data.data.data[0].rinku,
                    loading: false,
                    activePage: response.data.data.pangkat.current_page,
                    itemsCountPerPage: response.data.data.pangkat.per_page,
                    totalItemsCount: response.data.data.pangkat.total,
                });
            })
            .catch(error => {
                swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
                this.setState({loading: false});
            });
    }

    componentDidMount() {
        this.getData();
        // this.getAgama();
        this.getGolongan();
        this.getJenisKenaikanPangkat();
    }

    componentDidUpdate() {
        // this.getTag();
    }

    renderData() {
        return !this.state.data.length ? <tr><td colSpan="9" className="text-center">Data Tidak Ditemukan</td></tr> :
            this.state.data.map(data => (
                <tr key={data.rinku} className="masariuman_table">
                    <th scope="row" className="text-center">{data.nomor}</th>
                    <td className="text-center">
                        {data.golongan} <br />
                        <small>{data.golongan2}</small> <br />
                        <small>TMT {data.tmtGolongan}</small>
                    </td>
                    <td className="text-center">
                        {data.jenisNaikPangkat}
                    </td>
                    <td className="text-center">
                        {data.nomorSk}  <br />
                        <small>{data.tanggalSk}</small>
                    </td>
                    <td className="text-center">
                        {data.nomorPertek} <br />
                        <small>{data.tanggalPertek}</small>
                    </td>
                    <td id="downloadButton">
                        {/* <div className="text-center">
                            {data.file ? (
                                <a href={`/zaFail/${data.file}`} className="mr-2 mb-2 btn btn-outline-secondary">Download</a>
                            ) : (
                                <span></span>
                            )}
                            <button data-target="#detailModal" data-toggle="modal" className="mr-2 mb-2 btn btn-outline-info" type="button" onClick={this.handleEditButton.bind(this, data.rinku)} id={'detail'+data.nomor}>Detail</button>
                        </div> */}
                        <div className="text-center">
                            {data.sutattsu === '2' ? (
                                <span className="masariuman_alasanVerifikasiClass">Pangkat Aktif</span>
                            ) : (
                                <button className="mr-2 mb-2 btn btn-outline-success" type="button" onClick={this.handleAktifButton.bind(this, data.rinku)} id={'hapus'+data.nomor}>Aktifkan</button>
                            )}
                            <br />
                            <button data-target="#editModal" data-toggle="modal" className="mr-2 mb-2 btn btn-outline-warning" type="button" onClick={this.handleEditButton.bind(this, data.rinku)} id={'ubah'+data.nomor}>Ubah</button> <br />
                            <button className="mr-2 mb-2 btn btn-outline-danger" type="button" onClick={this.handleDeleteButton.bind(this, data.rinku)} id={'hapus'+data.nomor}>Hapus</button>
                        </div>
                    </td>
                </tr>
            ));
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

    renderSelectGolongan() {
        return this.state.pangkat.map((data) => (
            <option value={data.rinku} key={data.rinku}>
                {data.name}
            </option>
        ));
    }

    renderSelectJenisKenaikanPangkat() {
        return this.state.jenisNaikPangkat.map((data) => (
            <option value={data.rinku} key={data.rinku}>
                {data.name}
            </option>
        ));
    }

    renderSelectKategori() {
        return this.state.kategori.map((data) => (
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
                            Tambah Data Jabatan Baru
                        </h4>
                        <form onSubmit={this.handleSubmit}>
                            <div className="row">
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Jenis Jabatan :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <select
                                        value={this.state.pangkat_id}
                                        onChange={this.handleChangeGolongan}
                                        className="form-control"
                                    >
                                        {this.renderSelectGolongan()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Unit Organisasi :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <select
                                        value={this.state.jenisNaikPangkat_id}
                                        onChange={this.handleChangeJenisKenaikanPangkat}
                                        className="form-control"
                                    >
                                        {this.renderSelectJenisKenaikanPangkat()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Bidang :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <select
                                        value={this.state.jenisNaikPangkat_id}
                                        onChange={this.handleChangeJenisKenaikanPangkat}
                                        className="form-control"
                                    >
                                        {this.renderSelectJenisKenaikanPangkat()}
                                    </select>x .p]fzl;fl;
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Sub Bidang :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <select
                                        value={this.state.jenisNaikPangkat_id}
                                        onChange={this.handleChangeJenisKenaikanPangkat}
                                        className="form-control"
                                    >
                                        {this.renderSelectJenisKenaikanPangkat()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeMasaKerjaGolonganTahun}
                                        value={this.state.masaKerjaGolonganTahun}
                                        title="Masa Kerja Golongan (Tahun)"
                                        placeholder="Masa Kerja Golongan (Tahun)..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeMasaKerjaGolonganBulan}
                                        value={this.state.masaKerjaGolonganBulan}
                                        title="Masa Kerja Golongan (Bulan)"
                                        placeholder="Masa Kerja Golongan (Bulan)..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    TMT Golongan :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTmtGolongan}
                                        value={this.state.tmtGolongan}
                                        title="TMT Golongan"
                                        placeholder="TMT Golongan..."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>

                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeNomorSK}
                                        value={this.state.nomorSk}
                                        title="Nomor Surat Keputusan (SK)"
                                        placeholder="Nomor Surat Keputusan (SK)..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Tanggal Surat Keputusan (SK) :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTanggalSK}
                                        value={this.state.tanggalSk}
                                        title="Tanggal Surat Keputusan (SK)"
                                        placeholder="Tanggal Surat Keputusan (SK)..."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>

                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeNomorPertek}
                                        value={this.state.nomorPertek}
                                        title="Nomor Pertek BKN"
                                        placeholder="Nomor Pertek BKN..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Tanggal Pertek BKN :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTanggalPertek}
                                        value={this.state.tanggalPertek}
                                        title="Tanggal Pertek BKN"
                                        placeholder="Tanggal Pertek BKN..."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>

                            <div className="col-sm-12">
                                <div className="form-group text-center">
                                    <button className="mr-2 mb-2 btn btn-primary" data-target="#onboardingWideFormModal" data-toggle="modal" type="submit">Tambah Data Jabatan Baru</button>
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
                <div className="modal-dialog modal-lg modal-centered" role="document">
                    <div className="modal-content text-center">
                    <button aria-label="Close" className="close" data-dismiss="modal" type="button"><span className="close-label">Tutup</span><span className="os-icon os-icon-close"></span></button>
                    <div className="onboarding-side-by-side">
                        <div className="onboarding-media">
                        <img alt="" src="/iconModal/mailPlus.png" width="200px" />
                        </div>
                        <div className="onboarding-content with-gradient masariuman_width100percent">
                        <h4 className="onboarding-title">
                            Ubah Data Jabatan
                        </h4>
                        <form onSubmit={this.handleEditSubmit}>
                        <div className="row">
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Golongan :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <select
                                        value={this.state.pangkat_id}
                                        onChange={this.handleChangeGolongan}
                                        className="form-control"
                                    >
                                        {this.renderSelectGolongan()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Jenis Kenaikan Pangkat (KP) :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <select
                                        value={this.state.jenisNaikPangkat_id}
                                        onChange={this.handleChangeJenisKenaikanPangkat}
                                        className="form-control"
                                    >
                                        {this.renderSelectJenisKenaikanPangkat()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeMasaKerjaGolonganTahun}
                                        value={this.state.masaKerjaGolonganTahun}
                                        title="Masa Kerja Golongan (Tahun)"
                                        placeholder="Masa Kerja Golongan (Tahun)..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeMasaKerjaGolonganBulan}
                                        value={this.state.masaKerjaGolonganBulan}
                                        title="Masa Kerja Golongan (Bulan)"
                                        placeholder="Masa Kerja Golongan (Bulan)..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    TMT Golongan :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTmtGolongan}
                                        value={this.state.tmtGolongan}
                                        title="TMT Golongan"
                                        placeholder="TMT Golongan..."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>

                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeNomorSK}
                                        value={this.state.nomorSk}
                                        title="Nomor Surat Keputusan (SK)"
                                        placeholder="Nomor Surat Keputusan (SK)..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Tanggal Surat Keputusan (SK) :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTanggalSK}
                                        value={this.state.tanggalSk}
                                        title="Tanggal Surat Keputusan (SK)"
                                        placeholder="Tanggal Surat Keputusan (SK)..."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>

                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeNomorPertek}
                                        value={this.state.nomorPertek}
                                        title="Nomor Pertek BKN"
                                        placeholder="Nomor Pertek BKN..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    Tanggal Pertek BKN :
                                </div>
                            </div>
                            <div className="col-sm-6">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeTanggalPertek}
                                        value={this.state.tanggalPertek}
                                        title="Tanggal Pertek BKN"
                                        placeholder="Tanggal Pertek BKN..."
                                        type="date"
                                        className="form-control"
                                    />
                                </div>
                            </div>

                            <div className="col-sm-12">
                                <div className="form-group text-center">
                                    <button className="mr-2 mb-2 btn btn-warning" data-target="#onboardingWideFormModal" data-toggle="modal" type="submit">Ubah Data Jabatan</button>
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
                                    <div className="col-md-3">
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
                                                    to={`/admin/pegawai/${this.props.match.params.url}/pns`}
                                                    className="btn-transition btn btn-shadow btn-outline-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> CPNS / PNS
                                                </Link>
                                            </div>
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/pangkat`}
                                                    className="btn-transition btn btn-shadow btn-outline-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> Pangkat
                                                </Link>
                                            </div>
                                            <div>
                                                <Link
                                                    to={`/admin/pegawai/${this.props.match.params.url}/jabatan`}
                                                    className="btn btn-primary masariuman_width100percent masariuman_borderleftright0px"
                                                >
                                                    <span className="pe-7s-pen"> </span> Jabatan
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-md-9">
                                        <div className="element-box">
                                            <h5 className="form-header">
                                            Jabatan {this.state.gelarDepan + this.state.namaLengkap + this.state.gelarBelakang}
                                            </h5>
                                            <div className="form-desc">
                                                Manajemen Jabatan Pegawai
                                            </div>
                                            <div>
                                                <button className="mr-2 mb-2 btn btn-primary" data-target="#tambahModal" data-toggle="modal" type="button" id="buttonTambahModal" onClick={this.handleTambahButton}>Tambah Jabatan Baru</button>
                                                {/* <div className="col-sm-4 float-right" id="cari">
                                                    <input type="text" className="form-control" onChange={this.handleChangeCari}
                                                        value={this.state.cari} placeholder="Cari Arsip..."></input>
                                                </div> */}
                                            </div>
                                            <div className="table-responsive" id="ruanganTable">
                                                <table id="tabeldata" width="100%" className="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr>
                                                            <th className="width50px text-center">NO</th>
                                                            <th className="width50px text-center">Pangkat</th>
                                                            <th className="width50px text-center">Jenis Naik Pangkat</th>
                                                            <th className="text-center">Nomor SK</th>
                                                            <th className="text-center">Nomor Pertek</th>
                                                            <th className="text-center">Aksi</th>
                                                            {/* <th className="width250px text-center">ACTION</th> */}
                                                        </tr>
                                                    </thead>
                                                    <tbody>{this.renderData()}</tbody>
                                                </table>
                                            </div>
                                            <div className="d-flex justify-content-center" id="pagination">
                                                <Pagination
                                                    activePage={this.state.activePage}
                                                    itemsCountPerPage={this.state.itemsCountPerPage}
                                                    totalItemsCount={this.state.totalItemsCount}
                                                    pageRangeDisplayed={this.state.pageRangeDisplayed}
                                                    onChange={this.handlePageChange}
                                                />
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
}

export default Jabatan;
