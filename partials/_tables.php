<div id="tables">
    <h4>Tables</h4>
    <div class="tables-container" flex="h" h-center v-center grow>
        <div flex="v">
            <div flex="h" class="tables-row">

                <!--
                    - Display unfulfilled order items per table instead, on this screen.
                    - Display full order list with completion indicators in another screen/popup window.
                    - Turn div.table into a partial/component template.
                -->

                <div class="table" dark-bg>
                    <div class="table-header">
                        <h4 no-margin>#1</h4>
                        <p class="status">Occupied</p>
                    </div>
                    <ul class="order-list">
                        <li><i class="fa-solid fa-x" danger-fr></i>Entree #2</li>
                        <li><i class="fa-solid fa-x" danger-fr></i>Entree #6</li>
                        <li><i class="fa-solid fa-x" danger-fr></i>Dessert #4</li>
                        <li><i class="fa-solid fa-x" danger-fr></i>Dessert #5</li>
                    </ul>
                    <div class="open-indicator"><i class="fa-solid fa-square-caret-right"></i></div>
                </div>
                <div class="table" info-bg>
                    <div class="table-header">
                        <h4 no-margin>#2</h4>
                        <p class="status">Reserved</p>
                    </div>
                    <ul class="order-list">
                        <li><i>John Dela Cruz</i></li>
                    </ul>
                    <div class="open-indicator"><i class="fa-solid fa-square-caret-right"></i></div>
                </div>
                <div class="table" good-bg>
                    <div class="table-header">
                        <h4 no-margin>#3</h4>
                        <p class="status">Open</p>
                    </div>
                    <div class="open-indicator"><i class="fa-solid fa-square-caret-right"></i></div>
                </div>
                <div class="table" good-bg>
                    <div class="table-header">
                        <h4 no-margin>#4</h4>
                        <p class="status">Open</p>
                    </div>
                    <div class="open-indicator"><i class="fa-solid fa-square-caret-right"></i></div>
                </div>
                <div class="table" info-bg>
                    <div class="table-header">
                        <h4 no-margin>#5</h4>
                        <p class="status">Reserved</p>
                    </div>
                    <ul class="order-list">
                        <li><i>Kate Go</i></li>
                    </ul>
                    <div class="open-indicator"><i class="fa-solid fa-square-caret-right"></i></div>
                </div>
                <div class="table" warning-bg>
                    <div class="table-header">
                        <h4 no-margin>#6</h4>
                        <p class="status">Bill Out</p>
                    </div>
                    <ul class="order-list">
                        <li><i>All Complete</i></li>
                    </ul>
                    <div class="open-indicator"><i class="fa-solid fa-square-caret-right"></i></div>
                </div>
                <div class="table" dark-bg>
                    <div class="table-header">
                        <h4 no-margin>#7</h4>
                        <p class="status">Occupied</p>
                    </div>
                    <ul class="order-list">
                        <li><i class="fa-solid fa-x" danger-fr></i>Entree #2</li>
                        <li><i class="fa-solid fa-x" danger-fr></i>Entree #3</li>
                        <li><i class="fa-solid fa-x" danger-fr></i>Entree #6</li>
                        <li><i class="fa-solid fa-x" danger-fr></i>Dessert #4</li>
                        <li><i class="fa-solid fa-x" danger-fr></i>Dessert #5</li>
                    </ul>
                    <div class="open-indicator"><i class="fa-solid fa-square-caret-right"></i></div>
                </div>
                <div class="table" danger-bg>
                    <div class="table-header">
                        <h4 no-margin>#8</h4>
                        <p class="status">Unavailable</p>
                    </div>
                    <div class="open-indicator"><i class="fa-solid fa-square-caret-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>