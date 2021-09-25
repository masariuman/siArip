import React, { Component } from "react";
import {
    BrowserRouter as Router,
    Switch,
    Route
} from "react-router-dom";
import Empatkosongempat from "./warudo/Empatkosongempat";
import DashboardIndex from "./component/dashboard/Index";
import KeluarIndex from "./component/keluar/Index";
import MasukIndex from "./component/masuk/Index";
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
import RefPejabatPenetapIndex from "./component/referensi/RefPejabatPenetapIndex";
import RefPejabatNegaraIndex from "./component/referensi/RefPejabatNegaraIndex";
import RefDiklatFungsionalIndex from "./component/referensi/RefDiklatFungsionalIndex";
import RefDiklatTeknisIndex from "./component/referensi/RefDiklatTeknisIndex";
import RefJabatanFungsionalUmumIndex from "./component/referensi/RefJabatanFungsionalUmumIndex";
import RefJabatanFungsionalTertentuIndex from "./component/referensi/RefJabatanFungsionalTertentuIndex";
import RefJabatanKORPRIIndex from "./component/referensi/RefJabatanKORPRIIndex";
import RefEselonJabatanIndex from "./component/referensi/RefEselonJabatanIndex";
import RefJenisJabatanIndex from "./component/referensi/RefJenisJabatanIndex";

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
                        path="/surat-keluar"
                        component={KeluarIndex}
                    />
                    <Route
                        exact
                        path="/surat-masuk"
                        component={MasukIndex}
                    />
                    <Route
                        exact
                        path="/kanrisha/uuzaa"
                        component={UuzaaIndex}
                    />
                    <Route
                        exact
                        path="/kanrisha/heya"
                        component={HeyaIndex}
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
                        path="/surat-keluar"
                        component={KeluarIndex}
                    />
                    <Route
                        exact
                        path="/surat-masuk"
                        component={MasukIndex}
                    />
                    <Empatkosongempat />
                </Switch>
            );
    }
}

export default ReactRoute;
