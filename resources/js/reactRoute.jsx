import React, { Component } from "react";
import {
    BrowserRouter as Router,
    Switch,
    Route
} from "react-router-dom";
import Empatkosongempat from "./warudo/Empatkosongempat";
import DashboardIndex from "./component/dashboard/Index";
import KeluarIndex from "./component/keluar/Index";

import PeremajaanData from "./component/peremajaan/Index";
import AdminIndex from "./component/dashboard/Admin";
import AdminDetailPegawai from "./component/peremajaan/Detail";
import AdminDetailPegawaiEdit from "./component/peremajaan/DetailEdit";
import AdminArsipPegawai from "./component/peremajaan/Arsip";
import AdminPengajuanPegawai from "./component/peremajaan/Pengajuan";
import AdminCpnsPegawai from "./component/peremajaan/Cpns";
import AdminCpnsPegawaiEdit from "./component/peremajaan/CpnsEdit";
import AdminPnsPegawai from "./component/peremajaan/Pns";
import AdminPnsPegawaiEdit from "./component/peremajaan/PnsEdit";
import AdminJabatanPegawai from "./component/peremajaan/Jabatan";
import AdminPangkatPegawai from "./component/peremajaan/Pangkat";


import UuzaaIndex from "./component/uuzaa/Index";
import HeyaIndex from "./component/heya/Index";
import RefAgamaIndex from "./component/referensi/Agama";
import RefUnorIndex from "./component/referensi/Unor";
import RefBidangIndex from "./component/referensi/Bidang";
import RefSubBidangIndex from "./component/referensi/SubBidang";
import RefStatusKepegawaianIndex from "./component/referensi/StatusKepegawaian";
import RefJenisHukumanDisiplinIndex from "./component/referensi/JenisHukumanDisiplin";
import RefJenisKepegawaianIndex from "./component/referensi/JenisKepegawaian";
import RefJenisPenghargaanIndex from "./component/referensi/JenisPenghargaan";
import RefKedudukanKepegawaianIndex from "./component/referensi/KedudukanKepegawaian";
import RefPangkatGolonganRuangIndex from "./component/referensi/PangkatGolonganRuang";
import RefSTLUDIndex from "./component/referensi/STLUD";
import RefJenisNaikPangkatIndex from "./component/referensi/JenisNaikPangkat";
import RefTingkatPendidikanIndex from "./component/referensi/TingkatPendidikan";
import RefJurusanPendidikanIndex from "./component/referensi/JurusanPendidikan";
import RefDiklatStrukturalIndex from "./component/referensi/DiklatStruktural";
import RefPejabatPenetapIndex from "./component/referensi/PejabatPenetap";
import RefPejabatNegaraIndex from "./component/referensi/PejabatNegara";
import RefDiklatFungsionalIndex from "./component/referensi/DiklatFungsional";
import RefDiklatTeknisIndex from "./component/referensi/DiklatTeknis";
import RefJabatanFungsionalUmumIndex from "./component/referensi/JabatanFungsionalUmum";
import RefJabatanFungsionalTertentuIndex from "./component/referensi/JabatanFungsionalTertentu";
import RefJabatanKORPRIIndex from "./component/referensi/JabatanKORPRI";
import RefEselonJabatanIndex from "./component/referensi/EselonJabatan";
import RefJenisJabatanIndex from "./component/referensi/JenisJabatan";
import RefKategoriArsipIndex from "./component/referensi/KategoriArsip";

import ArsipIndex from "./component/pegawai/Arsip";
import PengajuanIndex from "./component/pegawai/Pengajuan";
import IdentitasPegawaiIndex from "./component/pegawai/IdentitasPegawai";
import IdentitasPegawaiEditIndex from "./component/pegawai/IdentitasPegawaiEdit";
import PnsIndex from "./component/pegawai/Pns";
import Pangkat from "./component/pegawai/Pangkat";
import Jabatan from "./component/pegawai/Jabatan";

class ReactRoute extends Component {
    constructor(props) {
        super(props);
        this.state = {
            level: ""
        };
    }

    getUuzaa() {
        axios.get("/getUuzaa").then((response) => {
            this.setState({
                level: response.data.data.reberu
            });
        });
    }

    componentDidMount() {
        this.getUuzaa();
    }

    render() {
        return (
            this.state.level === "0" ?
                <Switch>
                    <Route
                        exact
                        path="/"
                        component={DashboardIndex}
                    />
                    <Route
                        exact
                        path="/arsip"
                        component={ArsipIndex}
                    />
                    <Route
                        exact
                        path="/pengajuan"
                        component={PengajuanIndex}
                    />
                    <Route
                        exact
                        path="/identitasPegawai"
                        component={IdentitasPegawaiIndex}
                    />
                    <Route
                        exact
                        path="/identitasPegawai/:url/edit"
                        component={IdentitasPegawaiEditIndex}
                    />
                    <Route
                        exact
                        path="/pns"
                        component={PnsIndex}
                    />
                    <Route
                        exact
                        path="/pangkat"
                        component={Pangkat}
                    />
                    <Route
                        exact
                        path="/jabatan"
                        component={Jabatan}
                    />




                    <Route
                        exact
                        path="/peremajaanData"
                        component={PeremajaanData}
                    />
                    <Route
                        exact
                        path="/admin"
                        component={AdminIndex}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/detail"
                        component={AdminDetailPegawai}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/detail/edit"
                        component={AdminDetailPegawaiEdit}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/arsip"
                        component={AdminArsipPegawai}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/pengajuan"
                        component={AdminPengajuanPegawai}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/cpns"
                        component={AdminCpnsPegawai}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/cpns/edit"
                        component={AdminCpnsPegawaiEdit}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/pns"
                        component={AdminPnsPegawai}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/pns/edit"
                        component={AdminPnsPegawaiEdit}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/jabatan"
                        component={AdminJabatanPegawai}
                    />
                    <Route
                        exact
                        path="/admin/pegawai/:url/pangkat"
                        component={AdminPangkatPegawai}
                    />




                    <Route
                        exact
                        path="/admin/referensi/agama"
                        component={RefAgamaIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/unor"
                        component={RefUnorIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/bidang"
                        component={RefBidangIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/SubBidang"
                        component={RefSubBidangIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/statusKepegawaian"
                        component={RefStatusKepegawaianIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jenisHukumanDisiplin"
                        component={RefJenisHukumanDisiplinIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jenisKepegawaian"
                        component={RefJenisKepegawaianIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jenisPenghargaan"
                        component={RefJenisPenghargaanIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/kedudukanKepegawaian"
                        component={RefKedudukanKepegawaianIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/pangkatGolonganRuang"
                        component={RefPangkatGolonganRuangIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/stlud"
                        component={RefSTLUDIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jenisNaikPangkat"
                        component={RefJenisNaikPangkatIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/tingkatPendidikan"
                        component={RefTingkatPendidikanIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jurusanPendidikan"
                        component={RefJurusanPendidikanIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/diklatStruktural"
                        component={RefDiklatStrukturalIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/diklatFungsional"
                        component={RefDiklatFungsionalIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/diklatTeknis"
                        component={RefDiklatTeknisIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jabatanFungsionalUmum"
                        component={RefJabatanFungsionalUmumIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jabatanFungsionalTertentu"
                        component={RefJabatanFungsionalTertentuIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jabatanKORPRI"
                        component={RefJabatanKORPRIIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/eselonJabatan"
                        component={RefEselonJabatanIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/jenisJabatan"
                        component={RefJenisJabatanIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/pejabatPenetap"
                        component={RefPejabatPenetapIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/pejabatNegara"
                        component={RefPejabatNegaraIndex}
                    />
                    <Route
                        exact
                        path="/admin/referensi/kategoriArsip"
                        component={RefKategoriArsipIndex}
                    />
                    <Empatkosongempat />
                </Switch>
            :
                <Switch>
                    <Route
                        exact
                        path="/"
                        component={DashboardIndex}
                    />
                    <Route
                        exact
                        path="/arsip"
                        component={ArsipIndex}
                    />
                    <Route
                        exact
                        path="/pengajuan"
                        component={PengajuanIndex}
                    />
                    <Route
                        exact
                        path="/identitasPegawai"
                        component={IdentitasPegawaiIndex}
                    />
                    <Route
                        exact
                        path="/identitasPegawai/:url/edit"
                        component={IdentitasPegawaiEditIndex}
                    />
                    <Route
                        exact
                        path="/pns"
                        component={PnsIndex}
                    />
                    <Route
                        exact
                        path="/pangkat"
                        component={Pangkat}
                    />
                    <Empatkosongempat />
                </Switch>
            );
    }
}

export default ReactRoute;
