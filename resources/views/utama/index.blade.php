@extends('tataletak.app')

@section('content')
<style>
    .section1 {
        font-family: "PT Serif", serif;
        margin: 0;
        padding: 0;
        margin-top: -50px;
        margin-bottom: -50px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #ffffff;
    }

    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 200%;
        gap: 60px;
    }

    .column {
        flex: 1;
        text-align: center;
    }

    .column img {
        width: 100%;
        height: auto;
        max-width: 300px;
        border-radius: 3px;
        margin-top: 25px;
        margin-bottom: 25px;
    }

    .center img {
        max-width: 400px;
    }

    h2 {
        font-weight: 700;
    }

    p {
        font-size: 14px;
        font-weight: 400;
        color: #555;
    }

    /* section 2 start */
    .section2 {
        align-items: center;
        justify-content: center;
        min-height: 120vh;
        background-color: #F6F6F6;
    }

    .section2 h4 {
        font-family: "PT Serif", serif;
        text-align: center;
        padding-top: 70px;
        padding-bottom: 50px;
    }

    .wrapper {
        padding-left: 60px;
        width: 90%;
    }

    .wrapper header {
        display: flex;
        align-items: center;
        padding: 25px 80px 25px 120px;
        justify-content: space-between;
    }

    header .icons {
        display: flex;
    }

    header .icons span {
        height: 38px;
        width: 38px;
        margin: 0 1px;
        cursor: pointer;
        color: #878787;
        text-align: center;
        line-height: 38px;
        font-size: 1.9rem;
        user-select: none;
        border-radius: 50%;
    }

    header .icons span:hover {
        background: #f2f2f2;
    }

    header .current-date {
        font-size: 1.45rem;
        font-weight: 500;
    }

    .calendar {
        padding: 20px;
    }

    .calendar ul {
        display: flex;
        flex-wrap: wrap;
        list-style: none;
        text-align: center;
    }

    .calendar .days {
        margin-bottom: 20px;
    }

    .calendar li {
        color: #333;
        width: calc(100% / 7);
        font-size: 1.07rem;
    }

    .calendar .weeks li {
        font-weight: 500;
        cursor: default;
    }

    .calendar .days li {
        z-index: 1;
        cursor: pointer;
        position: relative;
        margin-top: 30px;
    }

    .days li.inactive {
        color: #aaa;
    }

    .days li.active {
        color: #fff;
    }

    .days li::before {
        position: absolute;
        content: "";
        left: 50%;
        top: 50%;
        height: 40px;
        width: 40px;
        z-index: -1;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .days li.active::before {
        background: #555;
    }

    .days li:not(.active):hover::before {
        background: #f2f2f2;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            text-align: center;
        }

        .column img {
            max-width: 250px;
        }

        .center img {
            max-width: 300px;
        }

        .calendar {
            width: 90%;
        }
    }
</style>
</head>

<body>
    <!-- tampilan navbar -->
    <section class="section1">
        <div class="container">
            <!-- Kolom Kiri -->
            <div class="column">
                <h5>Makes your moment looks epic.</h5>
                <img src="{{ asset('img/img2.jpg') }}" alt="Couple Holding Hands">
                <p>Every detail, tears, and moment is more precious than any jewelry in the world.</p>
            </div>

            <!-- Kolom Tengah (Gambar Besar) -->
            <div class="column center">
                <img src="{{ asset('img/img1.jpg') }}" alt="Bride and Groom">
            </div>

            <!-- Kolom Kanan -->
            <div class="column">
                <h5>Hello, We are pehpotret.</h5>
                <img src="{{ asset('img/img3.jpg') }}" alt="Wedding Rings">
                <p>Their moment is more precious than any <br> jewelry in the world.</p>
            </div>
        </div>
    </section>

    <section class="section2">
        <h4>SCHEDULING PEHPOTRET</h4>
        <div class="wrapper">
            <header>
                <p class="current-date"></p>
                <div class="icons">
                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                    <span id="next" class="material-symbols-rounded">chevron_right</span>
                </div>
            </header>
            <div class="calendar">
                <ul class="weeks">
                    <li>Sun</li>
                    <li>Mon</li>
                    <li>Tue</li>
                    <li>Wed</li>
                    <li>Thu</li>
                    <li>Fri</li>
                    <li>Sat</li>
                </ul>
                <ul class="days"></ul>
            </div>
        </div>
    </section>

    <script>
        const daysTag = document.querySelector(".days"),
            currentDate = document.querySelector(".current-date"),
            prevNextIcon = document.querySelectorAll(".icons span");

        let date = new Date(),
            currYear = date.getFullYear(),
            currMonth = date.getMonth();

        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        const renderCalendar = () => {
            let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
                lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
                lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
                lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();

            let liTag = "";

            for (let i = firstDayofMonth; i > 0; i--) {
                liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
            }

            for (let i = 1; i <= lastDateofMonth; i++) {
                let isToday = i === date.getDate() &&
                    currMonth === new Date().getMonth() &&
                    currYear === new Date().getFullYear() ? "active" : "";

                liTag += `<li class="${isToday}" data-date="${i}" data-month="${currMonth}" data-year="${currYear}">${i}</li>`;
            }

            for (let i = lastDayofMonth; i < 6; i++) {
                liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`;
            }

            currentDate.innerText = `${months[currMonth]} ${currYear}`;
            daysTag.innerHTML = liTag;

            document.querySelectorAll(".days li:not(.inactive)").forEach((day) => {
                day.addEventListener("click", function() {
                    let selectedDate = this.getAttribute("data-date");
                    let selectedMonth = this.getAttribute("data-month");
                    let selectedYear = this.getAttribute("data-year");

                    window.location.href = `/show?date=${selectedDate}&month=${selectedMonth}&year=${selectedYear}`;
                });
            });
        };

        renderCalendar();

        prevNextIcon.forEach((icon) => {
            icon.addEventListener("click", () => {
                currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

                if (currMonth < 0 || currMonth > 11) {
                    date = new Date(currYear, currMonth, new Date().getDate());
                    currYear = date.getFullYear();
                    currMonth = date.getMonth();
                } else {
                    date = new Date();
                }
                renderCalendar();
            });
        });
    </script>
</body>
@endsection