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


class IdentitasPegawaiEdit extends Component {
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


            alamat:"",
            telepon:"",
            handphone:"",
            emailDinas:"",
            emailPribadi:"",
            nik:"",
            nomorKK:"",
            lokasiKerja:"",
            akta:"",
            npwp:"",
            tanggalNpwp:"",
            bpjs:"",
            karis:"",
            taspen:"",
            tanggalTaspen:"",
            tapera:"",
            kppn:"",
            kelasJabatan:"",



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


        this.handleChangeNip = this.handleChangeNip.bind(this);
        this.handleChangeNip9 = this.handleChangeNip9.bind(this);

        this.handleChangeGelarDepan = this.handleChangeGelarDepan.bind(this);
        this.handleChangeNamaLengkap = this.handleChangeNamaLengkap.bind(this);
        this.handleChangeGelarBelakang = this.handleChangeGelarBelakang.bind(this);
        this.handleChangeAlamat = this.handleChangeAlamat.bind(this);
        this.handleChangeTelepon = this.handleChangeTelepon.bind(this);
        this.handleChangeHandphone = this.handleChangeHandphone.bind(this);
        this.handleChangeEmailDinas = this.handleChangeEmailDinas.bind(this);
        this.handleChangeEmailPribadi = this.handleChangeEmailPribadi.bind(this);
        this.handleChangeNik = this.handleChangeNik.bind(this);
        this.handleChangeNomorKK = this.handleChangeNomorKK.bind(this);
        this.handleChangeAgama = this.handleChangeAgama.bind(this);
        this.handleChangeLokasiKerja = this.handleChangeLokasiKerja.bind(this);
        this.handleChangeAkta = this.handleChangeAkta.bind(this);
        this.handleChangeNpwp = this.handleChangeNpwp.bind(this);
        this.handleChangeTanggalNpwp = this.handleChangeTanggalNpwp.bind(this);
        this.handleChangeBpjs = this.handleChangeBpjs.bind(this);
        this.handleChangeKaris = this.handleChangeKaris.bind(this);
        this.handleChangeTaspen = this.handleChangeTaspen.bind(this);
        this.handleChangeTanggalTaspen = this.handleChangeTanggalTaspen.bind(this);
        this.handleChangeTapera = this.handleChangeTapera.bind(this);
        this.handleChangeKppn = this.handleChangeKppn.bind(this);
        this.handleChangeKelasJabatan = this.handleChangeKelasJabatan.bind(this);


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
        // // console.log(e.target.value);
    }

    handleChangeAgama(e) {
        this.setState({
            agamaUser: e.target.value
        });
        // // console.log(e.target.value);
    }

    handleChangeKategori(e) {
        this.setState({
            kategoriName: e.target.value
        });
        // // console.log(e.target.value);
    }

    handleChangeName(e) {
        this.setState({
            name: e.target.value
        });
        // // console.log(e.target.value);
    }

    handleChangeKeterangan(e) {
        this.setState({
            keterangan: e.target.value
        });
        // // console.log(e.target.value);
    }

    handleChangeNip(e) {
        this.setState({
            nip: e.target.value
        });
        // // console.log(e.target.value);
    }

    handleChangeNip9(e) {
        this.setState({
            nip9: e.target.value
        });
        // // console.log(e.target.value);
    }


    handleChangeTempatLahir(e) {
        this.setState({
            tempatLahir: e.target.value
        });
        // // console.log(e.target.value);
    }

    handleChangeTanggalLahir(e) {
        this.setState({
            tanggalLahir: e.target.value
        });
        // // console.log(e.target.value);
    }

    handleChangeUnor(e) {
        this.setState({
            unorName: e.target.value
        });
        axios.get(`/admin/referensi/unorBidang/${e.target.value}`).then((response) => {
            // // console.log(response);
            this.setState({
                bidang: response.data.data.bidang.data,
                bidangName: response.data.data.bidang.data[0].url,
                subbid: response.data.data.subbid,
                subbidName: response.data.data.subbid[0].rinku,
            });
        });
        // // console.log(e.target.value);
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
        // // console.log(e.target.value);
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
        // // console.log(e.target.value);
    }

    handleChangeFile(e) {
        if (e.target.files[0].size >= 2045398) {
            swal("Error!", "Ukuran Data Harus Dibawah 2MB", "error");
        } else {
            this.setState({
                file: e.target.files[0],
                filePath: e.target.value,
                fileUrl: e.target.value,
        });
        }
    }

    handleChangeCari(e) {
        this.setState({
            cari: e.target.value
        });
        axios
            .post(`/pegawai/arsip/search`, {
                cari: e.target.value
            })
            .then(response => {
                //// console.log(response.data.data.data);
                this.setState({
                    arsip: response.data.data.data,
                    loading: false,
                    activePage: response.data.data.current_page,
                    itemsCountPerPage: response.data.data.per_page,
                    totalItemsCount: response.data.data.total,
                    pageRangeDisplayed: 10
                });
                // // console.log(this.state.tag);
            });
    }

    handleDeleteButton(e) {
        axios
            .get(`/pegawai/arsip/${e}/edit`)
            .then(response => {
                swal({
                    title: `Yakin ingin menghapus arsip ${response.data.data.name} ?`,
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
                            .delete(`/admin/pegawai/arsip/${e}`, {
                                url: e
                            })
                            .then(response => {
                                this.setState({
                                    arsip : response.data.data.arsip.data,
                                    loading: false
                                });
                                swal("Sukses!", "Data Berhasil Dihapus!", "success");
                                // // console.log("from handle sumit", response);
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
            .get(`/pegawai/arsip/${e}/edit`)
            .then(response => {
                //// console.log(response);
                this.setState({
                    kategoriName : response.data.data.kategori_name,
                    name : response.data.data.name,
                    keterangan : response.data.data.keterangan,
                    loading: false,
                    url: e,
                    filePath: response.data.data.file,
                    fileUrl: response.data.data.fileurl,
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
        // // console.log(e.target.value);
    }

    handleEditInputChange(e) {
        this.setState({
            dataEditInput: e.target.value
        });
        // // console.log(e.target.value);
    }

    handleSubmit(e) {
        e.preventDefault();
        this.setState({
            loading: true
        });
        const data = new FormData();
        data.append('file', this.state.file);
        data.append('kategoriName', this.state.kategoriName);
        data.append('keterangan', this.state.keterangan);
        data.append('name', this.state.name);
        data.append('pegawai_id', this.props.match.params.url);
        axios
            .post(`/pegawai/arsip`, data)
            .then(response => {
                // console.log(response);
                this.setState({
                    arsip: [response.data.data.arsip, ...this.state.arsip],
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
                // // console.log("from handle sumit", response);
            })
            .catch(error => {
                this.setState({
                    loading: false
                });
                swal("Error!", "Gagal Memasukkan Data Baru, Silahkan Hubungi Admin!", "error");
            });
        // // console.log(this.state.create);
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
        data.append('identitasId', this.props.match.params.url);
        // // console.log(data);
        axios
            .post(`/identitasPegawai/deeta`, data)
            .then(response => {
                swal("Sukses!", "Data Berhasil Diubah!", "success");
                this.props.history.push(`/identitasPegawai`);
            })
            .catch(error => {
                this.setState({
                    loading: false
                });
                swal("Error!", "Gagal Mengubah Data, Silahkan Hubungi Admin!", "error");
            });
        // // console.log(this.state.create);
    }

    getData() {
        this.setState({
            // loading: true
        });
        axios
            .get(`/identitasPegawai/deeta/${this.props.match.params.url}/edit`)
            .then(response => {
                //// console.log(response);
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
                    loading: false,
                    url: response.data.data.identitasPegawai.rinku,
                    // activePage: response.data.data.current_page,
                    // itemsCountPerPage: response.data.data.per_page,
                    // totalItemsCount: response.data.data.total,
                    // pageRangeDisplayed: 10
                });
                $('#petunjuk').on('click',function() {
                    var enjoyhint_instance = new EnjoyHint({});
                    var enjoyhint_script_steps = [
                    {
                        'next #ubah' : 'Untuk Mengubah Data, Tekan Tombol Ubah Berikut'
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
                // agamaUser: response.data.data[0].rinku,
            });
        });
    }

    getKategori() {
        // axios.get("/admin/referensi/kategoriArsip/create").then((response) => {
        //     this.setState({
        //         kategori: response.data.data,
        //         kategoriName: response.data.data[0].rinku,
        //     });
        // });
    }

    getUnor() {
        // axios.get("/admin/referensi/unorBidang").then((response) => {
        //     this.setState({
        //         unor: response.data.data.unor,
        //         unorName: response.data.data.unor[0].rinku,
        //         bidang: response.data.data.bidang,
        //         unorName: response.data.data.bidang[0].rinku,
        //         subbid: response.data.data.subbid,
        //         subbidName: response.data.data.subbid[0].rinku,
        //     });
        // });
    }

    handlePageChange(pageNumber) {
        this.setState({
            loading: true
        });
        axios
            .get(`/admin/pegawai/${this.props.match.params.url}?page=${pageNumber}`)
            .then(response => {
                //// console.log(response);
                this.setState({
                    arsip : response.data.data.arsip.data,
                    // data: response.data.data.arsip.data,
                    loading: false,
                    activePage: response.data.data.arsip.current_page,
                    itemsCountPerPage: response.data.data.arsip.per_page,
                    totalItemsCount: response.data.data.arsip.total,
                    pageRangeDisplayed: 10
                });
            })
            .catch(error => {
                swal("Error!", "Terdapat Masalah, Silahkan Hubungi Admin!", "error");
                this.setState({loading: false});
            });
    }

    componentDidMount() {
        this.getData();
        this.getAgama();
        // this.getUnor();
        // this.getKategori();
    }

    componentDidUpdate() {
        // this.getTag();
    }

    renderData() {
        // return !this.state.arsip.length ? <tr><td colSpan="9" className="text-center">Data Tidak Ditemukan</td></tr> :
        //     this.state.arsip.map(data => (
        //         <tr key={data.rinku} className="masariuman_table">
        //             <th scope="row" className="text-center">{data.nomor}</th>
        //             <td className="text-center">
        //                 <Highlighter
        //                     highlightClassName="YourHighlightClass"
        //                     searchWords={[this.state.cari]}
        //                     autoEscape={true}
        //                     textToHighlight={data.kategori.name}
        //                 />
        //             </td>
        //             <td className="text-center">
        //                 <Highlighter
        //                     highlightClassName="YourHighlightClass"
        //                     searchWords={[this.state.cari]}
        //                     autoEscape={true}
        //                     textToHighlight={data.name}
        //                 />
        //             </td>
        //             <td className="text-center">
        //                 <Highlighter
        //                     highlightClassName="YourHighlightClass"
        //                     searchWords={[this.state.cari]}
        //                     autoEscape={true}
        //                     textToHighlight={data.keterangan}
        //                 />
        //             </td>
        //             <td id="downloadButton">
        //                 <div className="text-center">
        //                     {data.file ? (
        //                         <a href={`/zaFail/${data.file}`} className="mr-2 mb-2 btn btn-outline-secondary">Download</a>
        //                     ) : (
        //                         <span></span>
        //                     )}
        //                     {/* <button data-target="#detailModal" data-toggle="modal" className="mr-2 mb-2 btn btn-outline-info" type="button" onClick={this.handleEditButton.bind(this, data.rinku)} id={'detail'+data.nomor}>Detail</button> */}
        //                 </div>
        //                 <div className="text-center">
        //                     <button data-target="#editModal" data-toggle="modal" className="mr-2 mb-2 btn btn-outline-warning" type="button" onClick={this.handleEditButton.bind(this, data.rinku)} id={'ubah'+data.nomor}>Ubah</button>
        //                     <button className="mr-2 mb-2 btn btn-outline-danger" type="button" onClick={this.handleDeleteButton.bind(this, data.rinku)} id={'hapus'+data.nomor}>Hapus</button>
        //                 </div>
        //             </td>
        //         </tr>
        //     ));
        // return (
        //     <tbody>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nama
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.gelarDepan + this.state.namaLengkap + this.state.gelarBelakang}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 NIP
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.nip}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Alamat Domisili
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.alamat}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor Telepon
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.telepon}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor Handphone
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.handphone}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Email Dinas
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.emailDinas}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Email Pribadi
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.emailPribadi}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 NIK
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.nik}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor KK
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.nomorKK}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Agama
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.agamaUser}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Lokasi Kerja (Setingkat Kecamatan)
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.lokasiKerja}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor Akta Kelahiran
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.akta}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor NPWP
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.npwp}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Tanggal NPWP
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.tanggalNpwp}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor BPJS / Kartu Indonesia Sehat
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.bpjs}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor Karis / Karsu
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.karis}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor TASPEN
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.taspen}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Tanggal TASPEN
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.tanggalTaspen}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Nomor TAPERA
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.taspen}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 KPPN/Kantor Pembayaran Gaji
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.kppn}
        //             </td>
        //         </tr>
        //         <tr className="masariuman_table">
        //             <td className="masariuman_tdTitle">
        //                 Kelas Jabatan (angka)
        //             </td>
        //             <td className="masariuman_tdContent">
        //                 {this.state.kelasJabatan}
        //             </td>
        //         </tr>
        //     </tbody>
            // );
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

    renderSelectKategori() {
        // return this.state.kategori.map((data) => (
        //     <option value={data.rinku} key={data.rinku}>
        //         {data.name}
        //     </option>
        // ));
    }

    renderSelectUnor() {
        // return this.state.unor.map((data) => (
        //     <option value={data.rinku} key={data.rinku}>
        //         {data.name}
        //     </option>
        // ));
    }

    renderSelectBidang() {
        // return this.state.bidang.map((data) => (
        //     <option value={data.rinku} key={data.rinku}>
        //         {data.name}
        //     </option>
        // ));
    }

    renderSelectSubbid() {
        // return this.state.subbid.map((data) => (
        //     <option value={data.rinku} key={data.rinku}>
        //         {data.name}
        //     </option>
        // ));
    }

    modalTambah() {
        // // console.log(this.state.agama);
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
                            Tambah Arsip Baru
                        </h4>
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
                            Ubah Data Arsip
                        </h4>
                        <form onSubmit={this.handleEditSubmit}>
                            <div className="row">
                            <div className="col-sm-3">
                                <div className="form-group">
                                    kategori :
                                </div>
                            </div>
                            <div className="col-sm-9">
                                <div className="form-group">
                                    <select
                                        value={this.state.kategoriName}
                                        onChange={this.handleChangeKategori}
                                        className="form-control"
                                    >
                                        {this.renderSelectKategori()}
                                    </select>
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeName}
                                        value={this.state.name}
                                        title="Nama Berkas"
                                        placeholder="Nama Berkas..."
                                        type="text"
                                        className="form-control"
                                    />
                                </div>
                            </div>
                            <div className="col-sm-12">
                                <div className="form-group">
                                    <input
                                        onChange={this.handleChangeKeterangan}
                                        value={this.state.keterangan}
                                        title="keterangan"
                                        placeholder="keterangan..."
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
                                                <button className="mr-2 mb-2 btn btn-primary" type="button" onClick={this.handleButtonFile} >Upload File</button>
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
                                    <button className="mr-2 mb-2 btn btn-warning" data-target="#onboardingWideFormModal" data-toggle="modal" type="submit">Ubah Arsip</button>
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
                        <a>Identitas Pegawai</a>
                    </li>
                    <li className="breadcrumb-item">
                        <span>Manajemen Identitas Pegawai</span>
                    </li>
                </ul>

                {/* content */}
                <div className="content-i masariuman-minheight100vh">
                        <div className="content-box">
                            <div className="element-wrapper">
                                {/* content here */}
                                <div className="row">
                                    <div className="col-md-12">
                                    <div className="element-box">
                                            <div className="masariuman_marginBottom50px">
                                                <div className="float-left">
                                                    <h5 className="form-header">
                                                        Ubah Identitas Pegawai
                                                    </h5>
                                                </div>
                                                <div className="float-right">
                                                    <button type="button" className="mr-2 mb-2 btn btn-success" onClick={this.handleEditSubmit} id="ubah">
                                                        Simpan Perubahan Identitas Pegawai
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
                                                            Gelar Depan
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
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
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nama
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeNamaLengkap}
                                                                value={this.state.namaLengkap}
                                                                title="Nama"
                                                                placeholder="Nama..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Gelar Belakang
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeGelarBelakang}
                                                                value={this.state.gelarBelakang}
                                                                title="Gelar Belakang"
                                                                placeholder="Gelar Belakang..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Alamat Domisili
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeAlamat}
                                                                value={this.state.alamat}
                                                                title="Alamat"
                                                                placeholder="Alamat..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Telepon
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTelepon}
                                                                value={this.state.telepon}
                                                                title="Telepn"
                                                                placeholder="Telepon..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Handphone
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeHandphone}
                                                                value={this.state.handphone}
                                                                title="Handphone"
                                                                placeholder="Handphone..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Email Dinas
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeEmailDinas}
                                                                value={this.state.emailDinas}
                                                                title="Email Dinas"
                                                                placeholder="Email Dinas..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Email Pribadi
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeEmailPribadi}
                                                                value={this.state.emailPribadi}
                                                                title="Email Pribadi"
                                                                placeholder="Email Pribadi..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            NIK
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeNik}
                                                                value={this.state.nik}
                                                                title="NIK"
                                                                placeholder="NIK..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor KK
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeNomorKK}
                                                                value={this.state.nomorKK}
                                                                title="Nomor KK"
                                                                placeholder="Nomor KK..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Agama
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
                                                            Lokasi Kerja (Setingkat Kecamatan)
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeLokasiKerja}
                                                                value={this.state.lokasiKerja}
                                                                title="Lokasi Kerja"
                                                                placeholder="Lokasi Kerja..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Akta Kelahiran
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeAkta}
                                                                value={this.state.akta}
                                                                title="Akta Kelahiran"
                                                                placeholder="Akta Kelahiran..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor NPWP
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeNpwp}
                                                                value={this.state.npwp}
                                                                title="NPWP"
                                                                placeholder="NPWP..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal NPWP
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTanggalNpwp}
                                                                value={this.state.tanggalNpwp}
                                                                title="Tanggal NPWP"
                                                                placeholder="Tanggal NPWP..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor BPJS / Kartu Indonesia Sehat
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeBpjs}
                                                                value={this.state.bpjs}
                                                                title="BPJS"
                                                                placeholder="BPJS..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor Karis / Karsu
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeKaris}
                                                                value={this.state.karis}
                                                                title="Karis / Karsu"
                                                                placeholder="Karis / Karsu..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor TASPEN
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTaspen}
                                                                value={this.state.taspen}
                                                                title="TASPEN"
                                                                placeholder="TASPEN..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Tanggal TASPEN
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTanggalTaspen}
                                                                value={this.state.tanggalTaspen}
                                                                title="Tanggal Taspen"
                                                                placeholder="Tanggal Taspen..."
                                                                type="date"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Nomor TAPERA
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeTapera}
                                                                value={this.state.tapera}
                                                                title="TAPERA"
                                                                placeholder="TAPERA..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            KPPN/Kantor Pembayaran Gaji
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeKppn}
                                                                value={this.state.kppn}
                                                                title="KPPN"
                                                                placeholder="KPPN..."
                                                                type="text"
                                                                className="form-control"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-4">
                                                        <div className="form-group">
                                                            Kelas Jabatan / Angka
                                                        </div>
                                                    </div>
                                                    <div className="col-sm-8">
                                                        <div className="form-group">
                                                            <input
                                                                onChange={this.handleChangeKelasJabatan}
                                                                value={this.state.kelasJabatan}
                                                                title="Kelas Jabatan"
                                                                placeholder="Kelas Jabatan..."
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
                                                        Simpan Perubahan Identitas Pegawai
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






    handleChangeGelarDepan(e) {
        this.setState({
            gelarDepan: e.target.value
        });
        // // console.log(e.target.value);
    }
    handleChangeNamaLengkap(e) {
        this.setState({
            namaLengkap: e.target.value
        });
        // // console.log(e.target.value);
    }
    handleChangeGelarBelakang(e) {
        this.setState({
            gelarBelakang: e.target.value
        });
        // // console.log(e.target.value);
    }
    handleChangeAlamat(e) {
        this.setState({
            alamat: e.target.value
        });
    }
    handleChangeTelepon(e) {
        this.setState({
            telepon: e.target.value
        });
    }
    handleChangeHandphone(e) {
        this.setState({
            handphone: e.target.value
        });
    }
    handleChangeEmailDinas(e) {
        this.setState({
            emailDinas: e.target.value
        });
    }
    handleChangeEmailPribadi(e) {
        this.setState({
            emailPribadi: e.target.value
        });
    }
    handleChangeNik(e) {
        this.setState({
            nik: e.target.value
        });
    }
    handleChangeNomorKK(e) {
        this.setState({
            nomorKK: e.target.value
        });
    }
    handleChangeAgama(e) {
        this.setState({
            agamaUser: e.target.value
        });
    }
    handleChangeLokasiKerja(e) {
        this.setState({
            lokasiKerja: e.target.value
        });
    }
    handleChangeAkta(e) {
        this.setState({
            akta: e.target.value
        });
    }
    handleChangeNpwp(e) {
        this.setState({
            npwp: e.target.value
        });
    }
    handleChangeTanggalNpwp(e) {
        this.setState({
            tanggalNpwp: e.target.value
        });
    }
    handleChangeBpjs(e) {
        this.setState({
            bpjs: e.target.value
        });
    }
    handleChangeKaris(e) {
        this.setState({
            karis: e.target.value
        });
    }
    handleChangeTaspen(e) {
        this.setState({
            taspen: e.target.value
        });
    }
    handleChangeTanggalTaspen(e) {
        this.setState({
            tanggalTaspen: e.target.value
        });
    }
    handleChangeTapera(e) {
        this.setState({
            tapera: e.target.value
        });
    }
    handleChangeKppn(e) {
        this.setState({
            kppn: e.target.value
        });
    }
    handleChangeKelasJabatan(e) {
        this.setState({
            kelasJabatan: e.target.value
        });
    }
}

export default IdentitasPegawaiEdit;
