import React, { Component } from "react";
import Footer from "../../warudo/Footer";
import DarkMode from "../../warudo/DarkMode";

import Loading from "../../warudo/Loading";
import swal from 'sweetalert';

// import $ from 'jquery';
// import 'react-summernote/dist/react-summernote.css'; // import styles
// import 'react-summernote/lang/summernote-id-ID'; // you can import any other locale

// import 'bootstrap/js/modal';
// import 'bootstrap/js/dropdown';
// import 'bootstrap/js/tooltip';
// import 'bootstrap/dist/css/bootstrap.css';

class DashboardIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            arsip: [],
            total: 0,
            data: [],
            date: [],
            totalArsip: 0,
            totalPengajuan: 0,
            totalMenunggu: 0,
            totalDiterima: 0,
            totalDitolak: 0,
            totalArsip30HariTerakhir : 0,

            dateTotalArsipPerDay: [],
            dateTotalPengajuanPerDay: [],
            dateTotalDiterimaPerDay: [],
            dateTotalDitolakPerDay: [],

            dataTotalArsipPerDay: [],
            dataTotalPengajuanPerDay: [],
            dataTotalDiterimaPerDay: [],
            dataTotalDitolakPerDay: [],
            loading: true
        };
        this.renderData = this.renderData.bind(this);
    }

    getData() {
        this.setState({
            loading: true
        });
        axios
            .get("/admin/dashboard/deeta")
            .then(response => {
                // console.log(response);
                this.setState({
                    totalArsip: response.data.data.totalArsip,
                    totalPengajuan: response.data.data.totalPengajuan,
                    totalMenunggu: response.data.data.totalMenunggu,
                    totalDiterima: response.data.data.totalDiterima,
                    totalDitolak: response.data.data.totalDitolak,

                    dateTotalArsipPerDay: response.data.data.dateTotalArsipPerDay,
                    dateTotalPengajuanPerDay: response.data.data.dateTotalPengajuanPerDay,
                    dateTotalDiterimaPerDay: response.data.data.dateTotalDiterimaPerDay,
                    dateTotalDitolakPerDay: response.data.data.dateTotalDitolakPerDay,

                    dataTotalArsipPerDay: response.data.data.dataTotalArsipPerDay,
                    dataTotalPengajuanPerDay: response.data.data.dataTotalPengajuanPerDay,
                    dataTotalDiterimaPerDay: response.data.data.dataTotalDiterimaPerDay,
                    dataTotalDitolakPerDay: response.data.data.dataTotalDitolakPerDay,

                    totalArsip30HariTerakhir: response.data.data.totalArsip30HariTerakhir,

                    arsip: response.data.data.belumVerif,

                    loading: false
                });
                // console.log(this.state);
                if ($("#translationChart").length) {
                    var translationChart = $("#translationChart"); // line chart data

                    var lineData = {
                      labels: this.state.dateTotalArsipPerDay,
                      datasets: [
                        {
                            label: "Total Arsip",
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: "#fff",
                            borderColor: "#bf00ff",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "#141E41",
                            pointBorderWidth: 3,
                            pointHoverRadius: 10,
                            pointHoverBackgroundColor: "#FC2055",
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 3,
                            pointRadius: 5,
                            pointHitRadius: 10,
                            data: this.state.dataTotalArsipPerDay,
                            spanGaps: false,
                            responsive: true
                        },
                        {
                            label: "Total Pengajuan Diterima",
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: "#fff",
                            borderColor: "#00ff37",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "#141E41",
                            pointBorderWidth: 3,
                            pointHoverRadius: 10,
                            pointHoverBackgroundColor: "#FC2055",
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 3,
                            pointRadius: 5,
                            pointHitRadius: 10,
                            data: this.state.dataTotalDiterimaPerDay,
                            spanGaps: false,
                            responsive: true
                        },
                        {
                            label: "Total Pengajuan Ditolak",
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: "#fff",
                            borderColor: "#fc1433",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "#141E41",
                            pointBorderWidth: 3,
                            pointHoverRadius: 10,
                            pointHoverBackgroundColor: "#FC2055",
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 3,
                            pointRadius: 5,
                            pointHitRadius: 10,
                            data: this.state.dataTotalDitolakPerDay,
                            spanGaps: false,
                            responsive: true
                        },
                        {
                            label: "Total Pengajuan",
                            fill: false,
                            lineTension: 0.3,
                            backgroundColor: "#fff",
                            borderColor: "#047bf8",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "#141E41",
                            pointBorderWidth: 3,
                            pointHoverRadius: 10,
                            pointHoverBackgroundColor: "#FC2055",
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 3,
                            pointRadius: 5,
                            pointHitRadius: 10,
                            data: this.state.dataTotalPengajuanPerDay,
                            spanGaps: false,
                            responsive: true
                        }
                      ]
                    }; // line chart init

                    var mytranslationChart = new Chart(translationChart, {
                      type: 'line',
                      data: lineData,
                      options: {
                        responsive: true,
                        legend: {
                            position: 'top',
                        },
                        scales: {
                          xAxes: [{
                            ticks: {
                              fontSize: '11',
                              fontColor: '#969da5'
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Tanggal'
                            },
                            gridLines: {
                              color: 'rgba(0,0,0,0.05)',
                              zeroLineColor: 'rgba(0,0,0,0.05)'
                            }
                          }],
                          yAxes: [{
                            display: true,
                            ticks: {
                              beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Jumlah'
                            }
                          }]
                        }
                      }
                    });
                  } // init donut chart if element exists
                  $('#petunjuk').on('click',function() {
                    var enjoyhint_instance = new EnjoyHint({});
                    var enjoyhint_script_steps = [
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
            });
    }

    componentDidMount() {
        this.getData();
    }

    handleDetail(e) {
        let path = `/admin/pegawai/${e}/pengajuan`;
        this.props.history.push(path);
    }

    renderData() {
        return !this.state.arsip.length ? <tr><td colSpan="9" className="text-center">Data Tidak Ditemukan</td></tr> :
            this.state.arsip.map(data => (
                <tr key={data.rinku} className="masariuman_table" onClick={this.handleDetail.bind(this, data.pegawaiRinku)}>
                    <th scope="row" className="text-center">{data.nomor}</th>
                    <td className="text-center">
                        {data.kategori.name}
                    </td>
                    <td className="text-center">
                        {data.name}
                    </td>
                    <td className="text-center">
                        {data.keterangan}
                    </td>
                    <td id="downloadButton" className="text-center">
                        <span className="mr-2 mb-2 btn btn-warning btn-rounded" type="button" data-target="#editModal" data-toggle="modal">
                            Belum Terverifikasi
                        </span>
                    </td>
                </tr>
            ));
    }

    render() {
        return (
            this.state.loading === true ? <Loading /> :
            <div className="content-w">
                {/* title content */}
                <div className="top-bar color-scheme-transparent masariuman-height103px">
                    <div className="top-menu-controls masariuman-marginleft30px">
                        <div className="icon-w top-icon masariuman-titlecontent" id="test">
                        <div className="os-icon os-icon-layout"></div>
                        </div>
                        <div className="masariuman-textleft">
                            <span className="masariuman-bold">Dashboard</span> <br/>
                            <small>Manajemen Dashboard</small>
                        </div>
                    </div>
                    <div className="top-menu-controls">
                        <button className="mr-2 mb-2 btn btn-outline-primary" type="button" id="petunjuk"><i className="batch-icon-bulb-2"></i> PETUNJUK <i className="batch-icon-bulb"></i></button>
                    </div>
                </div>
                <ul className="breadcrumb">
                    <li className="breadcrumb-item">
                        <a>Dashboard</a>
                    </li>
                    <li className="breadcrumb-item">
                        <span>Dashboard</span>
                    </li>
                </ul>

                {/* content */}
                <div className="content-i masariuman-minheight100vh">
                        <div className="content-box">
                            <div className="row">
                                <div className="col-sm-12">
                                    <div className="element-wrapper masariuman_displayFlex masariuman_paddingBottom0">
                                        <div className="col-sm-6">
                                            <a className="element-box el-tablo centered trend-in-corner padded bold-label masariuman_colorPurple">
                                                <div className="value">
                                                    {this.state.totalArsip}
                                                </div>
                                                <div className="label">
                                                    Total Arsip
                                                </div>
                                            </a>
                                        </div>
                                        <div className="col-sm-6">
                                            <a className="element-box el-tablo centered trend-in-corner padded bold-label">
                                                <div className="value">
                                                    {this.state.totalMenunggu}
                                                </div>
                                                <div className="label">
                                                    Total Pengajuan Belum Diverifikasi
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-sm-12">
                                    <div className="element-wrapper masariuman_paddingBottom0">
                                        {/* content here */}
                                        <div className="element-box">
                                            <h5 className="form-header">
                                                Dashboard
                                            </h5>
                                            <div className="form-desc">
                                                Manajemen Dashboard
                                            </div>
                                            <div className="os-tabs-w">
                                                <div className="os-tabs-controls">
                                                    <ul className="nav nav-tabs smaller">
                                                        <li className="nav-item">
                                                            <a className="nav-link active" data-toggle="tab">Total Arsip dan Pengajuan 30 Hari Terakhir</a>
                                                        </li>
                                                    </ul>
                                                    <ul className="nav nav-pills smaller d-none d-md-flex">
                                                        {/* <li className="nav-item">
                                                            <a className="nav-link active masariuman_cursorPointer" data-toggle="tab" onClick={this.changeGetData.bind(this, 7)}>7 Days</a>
                                                        </li>
                                                        <li className="nav-item">
                                                            <a className="nav-link masariuman_cursorPointer" data-toggle="tab" onClick={this.changeGetData.bind(this, 14)}>14 Days</a>
                                                        </li>
                                                        <li className="nav-item">
                                                            <a className="nav-link masariuman_cursorPointer" data-toggle="tab" onClick={this.changeGetData.bind(this, 30)}>30 Days</a>
                                                        </li> */}
                                                    </ul>
                                                </div>
                                                <div className="tab-content">
                                                    <div className="tab-pane active" id="tab_overview">
                                                        <div className="el-tablo bigger">
                                                            <div className="label">
                                                                Total Arsip 30 Hari Terakhir
                                                            </div>
                                                            <div className="value">
                                                                {this.state.totalArsip30HariTerakhir}
                                                            </div>
                                                        </div>
                                                        <div className="el-chart-w">
                                                            <canvas height="150px" id="translationChart" width="600px"></canvas>
                                                        </div>
                                                    </div>
                                                    <div className="tab-pane" id="tab_sales"></div>
                                                    <div className="tab-pane" id="tab_conversion"></div>
                                                </div>
                                            </div>
                                        </div>
                                        {/* end content here */}
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-sm-12">
                                    <div className="element-wrapper masariuman_paddingBottom0">
                                        {/* content here */}
                                        <div className="element-box">
                                            <h5 className="form-header">
                                                Data Yang Belum Diverifikasi
                                            </h5>
                                            <div className="form-desc">
                                                Tekan pada data untuk membuka profil pegawai dari pengajuan yang diajukan
                                            </div>
                                            <div className="table-responsive" id="ruanganTable">
                                                <table id="tabeldata" width="100%" className="table table-striped table-lightfont">
                                                    <thead>
                                                        <tr>
                                                            <th className="width50px text-center">NO</th>
                                                            <th className="width50px text-center">Kategori</th>
                                                            <th className="text-center">Nama Arsip</th>
                                                            <th className="text-center">Keterangan</th>
                                                            <th className="text-center">Status</th>
                                                            {/* <th className="width250px text-center">ACTION</th> */}
                                                        </tr>
                                                    </thead>
                                                    <tbody>{this.renderData()}</tbody>
                                                </table>
                                            </div>
                                            <div className="d-flex justify-content-center" id="pagination">
                                                {/* <Pagination
                                                    activePage={this.state.activePage}
                                                    itemsCountPerPage={this.state.itemsCountPerPage}
                                                    totalItemsCount={this.state.totalItemsCount}
                                                    pageRangeDisplayed={this.state.pageRangeDisplayed}
                                                    onChange={this.handlePageChange}
                                                /> */}
                                            </div>
                                        </div>
                                        {/* end content here */}
                                    </div>
                                </div>
                            </div>
                            <DarkMode />
                        </div>
                    </div>
                <Footer />
            </div>
        );
    }
}

export default DashboardIndex;
