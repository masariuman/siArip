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
import SubBidangIndex from "./component/alhuqulAlfareia/Index";
import RefAgamaIndex from "./component/referensi/Agama";
import RefUnorIndex from "./component/referensi/Unor";
import RefBidangIndex from "./component/referensi/Bidang";
import RefSubBidangIndex from "./component/referensi/SubBidang";

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
                        path="/kanrisha/subBidang"
                        component={SubBidangIndex}
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
