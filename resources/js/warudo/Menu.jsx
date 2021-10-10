import React, { Component } from "react";
import { NavLink, Link } from "react-router-dom";
import swal from 'sweetalert';

class Menu extends Component {
    constructor(props) {
        super(props);
        this.state = {
            uuzaaMei: "",
            reberu: "",
            sashin: "",
            rinku: "",
            newPass: "",
            newPassConfirm: "",
            level: "",
            oldPass:"",
            file: null,
            filePath: null,
            fileUrl: null,
            confirmOldPass: null,
        };
        this.renderSashin = this.renderSashin.bind(this);
        this.renderLegendMenu = this.renderLegendMenu.bind(this);
        this.handleButtonLogout = this.handleButtonLogout.bind(this);
        this.handleEditButton = this.handleEditButton.bind(this);
        this.modalPengaturanUser = this.modalPengaturanUser.bind(this);
        this.handleChangeFile = this.handleChangeFile.bind(this);
        this.handleButtonFile = this.handleButtonFile.bind(this);
        this.handleChangePassword = this.handleChangePassword.bind(this);
        this.handleChangeNewPass = this.handleChangeNewPass.bind(this);
        this.handleChangeNewPassConfirm = this.handleChangeNewPassConfirm.bind(this);
        this.handleChangeOldPass = this.handleChangeOldPass.bind(this);
        this.noNav = this.noNav.bind(this);
    }

    noNav(e) {
        e.preventDefault();
    }

    handleChangeNewPass(e) {
        this.setState({
            newPass: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeNewPassConfirm(e) {
        this.setState({
            newPassConfirm: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangeOldPass(e) {
        this.setState({
            oldPass: e.target.value
        });
        // console.log(e.target.value);
    }

    handleChangePassword(e) {
        e.preventDefault();
        this.setState({
            loading: true
        });
        if(this.state.newPass != this.state.newPassConfirm) {
            swal("Error!", "Password Baru dan Konfirmasi Password Baru Tidak Sama", "error");
        } else {
            axios
            .put(`/kanrisha/uuzaa/deeta/${this.state.rinku}`, {
                newPass: this.state.newPass,
                newPassConfirm: this.state.newPassConfirm,
                oldPass: this.state.oldPass
            })
            .then(response => {
                console.log(response);
                if(!response.data.data.data.oldPassConfirm) {
                    swal("Error!", "Password Lama Salah", "error");
                } else {
                    this.setState({
                        pass: "",
                        oldPass: "",
                        loading: false
                    });
                    $("#pengaturanUserModal").removeClass("in");
                    $(".modal-backdrop").remove();
                    $('body').removeClass('modal-open');
                    $('body').css('padding-right', '');
                    $("#pengaturanUserModal").hide();
                    swal("Sukses!", "Password Berhasil Diubah!", "success");
                    // console.log("from handle sumit", response);
                }
            })
            .catch(error => {
                this.setState({
                    loading: false
                });
                swal("Error!", "Gagal Mengubah Data, Silahkan Hubungi Admin!", "error");
            });
        }
    }

    handleButtonFile(e) {
        this.refs.fileUploader.click();
        // console.log(e.target.value);
    }

    handleChangeFile(e) {
        // console.log(e.target.files[0]);
        // this.setState({
        //     file: e.target.files[0],
        //     filePath: e.target.value,
        //     fileUrl: e.target.value,
        // });
        const data = new FormData();
        data.append('file', e.target.files[0]);
        axios
            .post("/kanrisha/uuzaa/sashin", data)
            .then(response => {
                // console.log(response.data.data.data);
                axios.get("/getUuzaa").then((response) => {
                    this.setState({
                        uuzaaMei: response.data.data.name,
                        reberu: response.data.data.level,
                        sashin: response.data.data.sashin,
                        rinku: response.data.data.rinku,
                    });
                });
                swal("Sukses!", "Foto Berhasi Diubah!", "success");
                // console.log("from handle sumit", response);
            })
            .catch(error => {
                this.setState({
                    loading: false
                });
                swal("Error!", "Gagal Mengubah Foto, Silahkan Hubungi Admin!", "error");
            });
    }

    modalPengaturanUser() {
        return (
            <div aria-hidden="true" className="onboarding-modal modal fade animated" id="pengaturanUserModal" role="dialog" tabIndex="-1">
                <div className="modal-dialog modal-centered" role="document">
                    <div className="modal-content text-center">
                        <button aria-label="Close" className="close" data-dismiss="modal" type="button"><span className="os-icon os-icon-close"></span></button>
                        <div className="onboarding-media">
                            <img alt="" src="img/bigicon5.png" width="200px" />
                        </div>
                        <div className="onboarding-content with-gradient">
                            <h4 className="onboarding-title">
                                Ubah Informasi Akun
                            </h4>
                            <div className="onboarding-text">
                                <table className="masariuman_width100percent">
                                    <tbody>
                                        <tr>
                                            <td className="text-center">
                                                {this.renderSashin()}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
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
                                                    <div className="form-group">
                                                        <button className="mr-2 mb-2 btn btn-primary" type="button" onClick={this.handleButtonFile} >Upload Foto Baru</button>
                                                    </div>
                                                    <div className="form-group">
                                                        <a target="_blank" href={this.state.fileUrl}>{this.state.filePath}</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr />
                            <form>
                                <div className="row">
                                    <div className="col-sm-12">
                                        <div className="form-group">
                                            <input
                                                onChange={this.handleChangeOldPass}
                                                value={this.state.oldPass}
                                                title="Password Lama"
                                                placeholder="Masukkan Password Lama.."
                                                type="password"
                                                className="form-control"
                                            />
                                        </div>
                                    </div>
                                    <div className="col-sm-6">
                                        <div className="form-group">
                                            <input
                                                onChange={this.handleChangeNewPass}
                                                value={this.state.newPass}
                                                title="Password Baru"
                                                placeholder="Masukkan Password Baru.."
                                                type="password"
                                                className="form-control"
                                            />
                                        </div>
                                    </div>
                                    <div className="col-sm-6">
                                        <div className="form-group">
                                            <input
                                                onChange={this.handleChangeNewPassConfirm}
                                                value={this.state.newPassConfirm}
                                                title="Password Baru"
                                                placeholder="Konfirmasi Password Baru.."
                                                type="password"
                                                className="form-control"
                                            />
                                        </div>
                                    </div>
                                    <div className="col-sm-12">
                                        <div className="form-group">
                                            <button className="mr-2 mb-2 btn btn-warning masariuman_width100percent" data-target="#onboardingWideFormModal" data-toggle="modal" type="button" onClick={this.handleChangePassword}>Ubah Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

    handleEditButton() {
        axios.get("/getUuzaa").then((response) => {
            this.setState({
                uuzaaMei: response.data.data.name,
                reberu: response.data.data.level,
                sashin: response.data.data.sashin,
                rinku: response.data.data.rinku,
            });
        });
    }

    handleButtonLogout() {
        swal({
            title: `Apakah Anda Yakin Ingin Logout/Keluar Dari Aplikasi ?`,
            text: "Anda Perlu Melakukan Login Ulang Setelah Logout/Keluar Dari Aplikasi Apabila Ingin Menggunakan Aplikasi Kembali",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                window.location.href = '/logout'
            } else {
            //   swal("Data Tidak Terhapus!");
            }
          });
    }

    getUuzaa() {
        axios.get("/getUuzaa").then((response) => {
            this.setState({
                uuzaaMei: response.data.data.name,
                reberu: response.data.data.level,
                sashin: response.data.data.sashin,
                rinku: response.data.data.rinku,
                level: response.data.data.reberu
            });
        });
    }

    componentDidMount() {
        this.getUuzaa();
    }

    renderSashin() {
        return !this.state.sashin || this.state.sashin === "" ? <img alt="" src="/warudo/dist/img/avatar.jpg" /> : <img alt="" src={"/sashin/"+this.state.sashin} />;
    }

    renderLegendMenu() {
        return this.state.level === "0" ?
            <li className=" has-sub-menu">
                <NavLink
                    onClick={this.noNav}
                    activeClassName="masariuman-active"
                    to={`/kanrisha`}
                >
                    <div className="icon-w">
                        <div className="os-icon os-icon-aperture"></div>
                    </div>
                    <span>User</span>
                </NavLink>
                <div className="sub-menu-w">
                    <div className="sub-menu-header">
                        REFERENSI
                    </div>
                    <div className="sub-menu-icon">
                        <i className="os-icon os-icon-aperture"></i>
                    </div>
                    <div className="sub-menu-i">
                        <ul className="sub-menu">
                            <li>
                                <Link to={`/admin/referensi/kategoriArsip`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Kategori Arsip
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/agama`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Agama
                                </Link>

                            </li>
                            <li>
                                <Link to={`/admin/referensi/unor`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Unit Organisasi
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/bidang`}>
                                    <i className="os-icon os-icon-home"></i> &nbsp;&nbsp;&nbsp;Bidang
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/subBidang`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Sub Bidang
                                </Link>
                            </li>
                            {/* <li>
                                <Link to={`/admin/referensi/kantorBayar`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Kantor Bayar
                                </Link>
                            </li> */}
                            <li>
                                <Link to={`/admin/referensi/statusKepegawaian`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Status Kepegawaian
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/kedudukanKepegawaian`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Kedudukan Kepegawaian
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisKepegawaian`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Jenis Kepegawaian
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisHukumanDisiplin`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Jenis Hukuman Disiplin
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisPenghargaan`}>
                                    <i className="os-icon os-icon-users"></i> &nbsp;&nbsp;&nbsp;Jenis Penghargaan
                                </Link>
                            </li>
                        </ul>
                        <ul className="sub-menu">
                            <li>
                                <Link to={`/admin/referensi/pangkatGolonganRuang`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Pangkat / Golongan Ruang
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/stlud`}>
                                    <i className="os-icon os-icon-home"></i> &nbsp;&nbsp;&nbsp;STLUD
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisNaikPangkat`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Jenis Naik Pangkat
                                </Link>
                            </li>
                        </ul>
                        <ul className="sub-menu">
                            <li>
                                <Link to={`/admin/referensi/tingkatPendidikan`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Tingkat Pendidikan
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jurusanPendidikan`}>
                                    <i className="os-icon os-icon-home"></i> &nbsp;&nbsp;&nbsp;Jurusan Pendidikan
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/diklatStruktural`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Diklat Struktural
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/diklatFungsional`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Diklat Fungsional
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/diklatTeknis`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Diklat Teknis
                                </Link>
                            </li>
                        </ul>
                        <ul className="sub-menu">
                            <li>
                                <Link to={`/admin/referensi/jabatanFungsionalUmum`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Jabatan Fungsional Umum
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jabatanFungsionalTertentu`}>
                                    <i className="os-icon os-icon-home"></i> &nbsp;&nbsp;&nbsp;Jabatan Fungsional Tertentu
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jabatanKorpri`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Jabatan KORPRI
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/eselonJabatan`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Eselon Jabatan
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/jenisJabatan`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Jenis Jabatan
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/pejabatPenetap`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Pejabat Penetap
                                </Link>
                            </li>
                            <li>
                                <Link to={`/admin/referensi/pejabatNegara`}>
                                    <i className="fa fa-sitemap"></i> &nbsp;&nbsp;&nbsp;Pejabat Negara
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        : <li></li>;
    }

    render() {
        return (
            <div className="menu-w color-scheme-dark color-style-bright menu-position-side menu-side-left menu-layout-mini sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                <div className="logo-w">
                    <a className="logo">
                        <div className="logo-element"></div>
                        <div className="logo-label">
                            Clean Admin
                        </div>
                    </a>
                </div>
                <div className="logged-user-w avatar-inline" id="userSetting">
                    <div className="logged-user-i">
                        <div className="avatar-w">
                            {this.renderSashin()}
                        </div>
                        <div className="logged-user-info-w">
                            <div className="logged-user-name">
                                {this.state.uuzaaMei}
                            </div>
                            <div className="logged-user-role">
                                {this.state.reberu}
                            </div>
                        </div>
                        <div className="logged-user-toggler-arrow">
                            <div className="os-icon os-icon-chevron-down"></div>
                        </div>
                        <div className="logged-user-menu color-style-bright">
                            <div className="logged-user-avatar-info">
                                <div className="avatar-w">
                                    {this.renderSashin()}
                                </div>
                                <div className="logged-user-info-w">
                                    <div className="logged-user-name">
                                        {this.state.uuzaaMei}
                                    </div>
                                    <div className="logged-user-role">
                                        {this.state.reberu}
                                    </div>
                                </div>
                            </div>
                            <div className="bg-icon">
                                <i className="os-icon os-icon-wallet-loaded"></i>
                            </div>
                            <ul>
                                <li id="pengaturanUser">
                                    <a data-target="#pengaturanUserModal" data-toggle="modal" onClick={this.handleEditButton}><i className="os-icon os-icon-signs-11"></i><span>Pengaturan User</span></a>
                                </li>
                                <li id="logout">
                                    <a onClick={this.handleButtonLogout}><i className="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                {/* <div className="menu-actions"> */}
                    {/* START - Settings Link in secondary top menu */}
                    {/* <div className="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
                        <i className="os-icon os-icon-ui-46"></i>
                        <div className="os-dropdown">
                            <div className="icon-w">
                                <i className="os-icon os-icon-ui-46"></i>
                            </div>
                            <ul>
                                <li>
                                    <a href="users_profile_small.html"><i className="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                                </li>
                            </ul>
                        </div>
                    </div> */}
                    {/* END - Settings Link in secondary top menu */}
                {/* </div> */}
                {/* <div className="element-search autosuggest-search-activator">
                    <input placeholder="Start typing to search..." type="text" />
                </div> */}
                <h1 className="menu-page-header">
                    Page Header
                </h1>
                <ul className="main-menu" id="meno">
                    <li className="sub-header">
                        <span>Layouts</span>
                    </li>
                    <li className="has-sub-menu">
                        <NavLink
                            exact
                            activeClassName="masariuman-active"
                            to={`/`}
                        >
                            <div className="icon-w">
                                <div className="os-icon os-icon-layout"></div>
                            </div>
                            <span>Dashboard</span>
                        </NavLink>
                        <div className="sub-menu-w">
                            <div className="sub-menu-header masariuman_colorWhite">
                                DASHBOARD
                            </div>
                            <div className="sub-menu-icon">
                                <i className="os-icon os-icon-layout"></i>
                            </div>
                            <div className="sub-menu-i masariuman_menuDescription">
                                Laman ini adalah laman utama dari aplikasi ini. Laman ini memuat informasi berupa jumlah surat dan memiliki grafik untuk melihat perkembangan surat perharinya.
                            </div>
                        </div>
                    </li>
                    <li className="has-sub-menu">
                        <NavLink
                            exact
                            activeClassName="masariuman-active"
                            to={`/arsip`}
                        >
                            <div className="icon-w">
                                <div className="os-icon os-icon-layout"></div>
                            </div>
                            <span>Arsip</span>
                        </NavLink>
                        <div className="sub-menu-w">
                            <div className="sub-menu-header masariuman_colorWhite">
                                ARSIP
                            </div>
                            <div className="sub-menu-icon">
                                <i className="os-icon os-icon-layout"></i>
                            </div>
                            <div className="sub-menu-i masariuman_menuDescription">
                                Laman ini adalah laman Arsip. Laman ini memuat Arsip dari pegawai yang bersangkutan.
                            </div>
                        </div>
                    </li>
                    <li className="has-sub-menu">
                        <NavLink
                            exact
                            activeClassName="masariuman-active"
                            to={`/pengajuan`}
                        >
                            <div className="icon-w">
                                <div className="os-icon os-icon-layout"></div>
                            </div>
                            <span>Pengajuan Data Baru / perubahan Data</span>
                        </NavLink>
                        <div className="sub-menu-w">
                            <div className="sub-menu-header masariuman_colorWhite">
                                PENGAJUAN DATA BARU / PERUBAHAN DATA
                            </div>
                            <div className="sub-menu-icon">
                                <i className="os-icon os-icon-layout"></i>
                            </div>
                            <div className="sub-menu-i masariuman_menuDescription">
                                Laman ini adalah laman Pengajuan. Laman ini adalah tempat untuk mengajukan data baru atau perubahan data yang telah ada yang didasarkan dengan bukti scan berkas yang berkaitan dengan pengajuan data yang ingin diajukan.
                            </div>
                        </div>
                    </li>
                    {/* <li id="menu">
                        <NavLink
                            exact
                            activeClassName="masariuman-active"
                            to={`/`}
                        >
                            <div className="icon-w">
                                <div className="os-icon os-icon-layout"></div>
                            </div>
                            <span>Dashboard</span>
                        </NavLink> */}
                        {/* <div className="sub-menu-w">
                            <div className="sub-menu-header">
                                Dashboard
                            </div>
                            <div className="sub-menu-icon">
                                <i className="os-icon os-icon-layout"></i>
                            </div>
                            <div className="sub-menu-i">
                                <ul className="sub-menu">
                                    <li>
                                        <a href="index.html">Dashboard 1</a>
                                    </li>
                                    <li>
                                        <a href="apps_crypto.html">Crypto Dashboard <strong className="badge badge-danger">Hot</strong></a>
                                    </li>
                                </ul>
                            </div>
                        </div> */}
                    {/* </li> */}
                    <li className=" has-sub-menu">
                        <NavLink
                            activeClassName="masariuman-active"
                            to={`/peremajaanData`}
                        >
                            <div className="icon-w">
                                <div className="os-icon os-icon-mail"></div>
                            </div>
                            <span>Input / Update Data Pegawai</span>
                        </NavLink>
                        <div className="sub-menu-w">
                            <div className="sub-menu-header masariuman_colorWhite">
                                Input / Update Data Pegawai
                            </div>
                            <div className="sub-menu-icon">
                                <i className="os-icon os-icon-mail"></i>
                            </div>
                            <div className="sub-menu-i masariuman_menuDescription">
                                Laman ini adalah laman untuk memanajemen data pegawai. Laman ini berisikan informasi data-data pegawai kabupaten mempawah.
                            </div>
                        </div>
                    </li>
                    <li className=" has-sub-menu">
                        <NavLink
                            activeClassName="masariuman-active"
                            to={`/surat-keluar`}
                        >
                            <div className="icon-w">
                                <div className="os-icon os-icon-email-forward"></div>
                            </div>
                            <span>Surat Keluar</span>
                        </NavLink>
                        <div className="sub-menu-w">
                            <div className="sub-menu-header masariuman_colorWhite">
                                SURAT KELUAR
                            </div>
                            <div className="sub-menu-icon">
                                <i className="os-icon os-icon-email-forward"></i>
                            </div>
                            <div className="sub-menu-i masariuman_menuDescription">
                                Laman ini adalah laman untuk memanajemen data dari surat yang keluar dari kantor ke kantor lain. Laman ini berisikan informasi surat-surat yang keluar dan file-file surat yang dapat di simpan atau di unduh/download.
                            </div>
                        </div>
                    </li>
                    {this.renderLegendMenu()}
                </ul>
                {this.modalPengaturanUser()}
            </div>
        );
    }
}

export default Menu;
