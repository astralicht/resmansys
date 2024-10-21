<div id="reservations">
    <div flex="v" grow>
        <div flex="h">
            <h4>Reservations</h4>
            <div flex="h" h-end grow>
                <form onsubmit="this.preventDefault();" flex="h" v-center>
                    <input type="date" id="res-date-filter">
                    <p no-margin onclick="fetchReservations" flex="h" v-center dark-bg style="padding: 11px 16px;"><i class="fa-solid fa-filter"></i>Filter</p>
                </form>
            </div>
        </div>
        <div id="active-reservations"><p style='text-align: center'><i>There are no reservations today.</i></p></div>
    </div>
</div>