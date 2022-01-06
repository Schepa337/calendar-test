<!DOCTYPE html>
<html>
<head>
	<title>calendar.test</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="main.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/ico" href="images/favicon.ico"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta property="og:title" content="calendar.test"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content="calendar.test"/>
    <meta property="og:locale" content="ru"/>
    <meta property="og:image" content="images/logo.png"/>
    <meta property="og:image:alt" content="calendar.test"/>
</head>
<body>
    <header>
        <section>
            <div id="month-calendar" data-date-start="" date-date-end="">
                <ul class="month">
                    <li class="prev">
                        <img class="img" src="images/arrow_forward.png">
                    </li>
                    <ul class="month__year">
                        <li class="month-name"></li>
                        <li class="year-name"></li>
                    </ul>
                    <li class="next">
                        <img class="img" src="images/arrow_forward.png">
                    </li>
                </ul>
                <ul class="weekdays">
                    <li>Пн</li>
                    <li>Вт</li>
                    <li>Ср</li>
                    <li>Чт</li>
                    <li>Пт</li>
                    <li>Сб</li>
                    <li>Вс</li>
                </ul>
                <ul class="days">
                    <li class="prev-days">30</li>
                    <li class="prev-days">31</li>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li class="active">7</li>
                    <li>8</li>
                    <li>9</li>
                    <li>10</li>
                    <li>11</li>
                    <li>12</li>
                    <li>13</li>
                    <li>14</li>
                    <li>15</li>
                    <li class="circle orange">16 <span>5</span></li>
                    <li>17</li>
                    <li>18</li>
                    <li class="circle purple">19 <span>6</span></li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li>30</li>
                    <li>31</li>
                    <li class="next-days">1</li>
                    <li class="next-">2</li>
                </ul>
            </div>
            <script>
                let nowDate = new Date(),
                nowDateNumber = nowDate.getDate(),
                nowMonth = nowDate.getMonth(),
                nowYear = nowDate.getFullYear(),
                container = document.getElementById('month-calendar'),
                monthContainer = container.getElementsByClassName('month-name')[0],
                yearContainer = container.getElementsByClassName('year-name')[0],
                daysContainer = container.getElementsByClassName('days')[0],
                prev = container.getElementsByClassName('prev')[0],
                next = container.getElementsByClassName('next')[0],
                monthName = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];



                let curDate = nowDate.setMonth(nowDate.getMonth() - 1);
                console.log(nowDate.getFullYear());

                function setMonthCalendar(year,month) {
                    let monthDays = new Date(year, month + 1, 0).getDate(),
                    monthPrefix = new Date(year, month, 0).getDay(),
                    monthDaysText = '';

                    monthContainer.textContent = monthName[month];
                    yearContainer.textContent = year;
                    daysContainer.innerHTML = '';

                    if (monthPrefix > 0){
                        for (let i = 1  ; i <= monthPrefix; i++){
                            monthDaysText += '<li></li>';
                        }
                    }

                    for (let i = 1; i <= monthDays; i++){
                        monthDaysText += '<li>' + i + '</li>';
                    }

                    daysContainer.innerHTML = monthDaysText;

                    if (month == nowMonth && year == nowYear){
                        days = daysContainer.getElementsByTagName('li');
                        days[monthPrefix + nowDateNumber - 1].classList.add('date-now');
                    }
                }
                setMonthCalendar(nowYear,nowMonth);

                prev.onclick = function () {
                    let curDate = new Date(yearContainer.textContent,monthName.indexOf(monthContainer.textContent));

                    curDate.setMonth(curDate.getMonth() - 1);

                    let curYear = curDate.getFullYear(),
                    curMonth = curDate.getMonth();

                    setMonthCalendar(curYear,curMonth);
                }

                next.onclick = function () {
                    let curDate = new Date(yearContainer.textContent,monthName.indexOf(monthContainer.textContent));

                    curDate.setMonth(curDate.getMonth() + 1);

                    let curYear = curDate.getFullYear(),
                    curMonth = curDate.getMonth();

                    setMonthCalendar(curYear,curMonth);
                }
                $('ul.days li').on('click', function() {
                    let day = $(this).prop("innerText")
                    let month = $('li.month-name').prop("innerText")
                    let year = $('li.year-name').prop("innerText")
                    let date_start = $('div#month-calendar').attr('data-date-start')
                    let date_end = $('div#month-calendar').attr('data-date-end')
                    if (parseInt(day) == NaN) {
                        return false
                    }
                    console.log('date_start', date_start)
                    if (date_start == '') {
                        $('div#month-calendar').attr('data-date-start', year+' '+month+' '+day)
                    } else if (date_end == '') {
                        $('div#month-calendar').attr('data-date-end',  year+' '+month+' '+day)
                    } else {
                        $('div#month-calendar').attr('data-date-start', year+' '+month+' '+day)
                        $('div#month-calendar').attr('data-date-end',  '')
                    }
                    date_start = $('div#month-calendar').attr('data-date-start')
                    date_end = $('div#month-calendar').attr('data-date-end')
                    console.log(date_start+' -> '+date_end)
                    console.log(year+' '+month+' '+day)
                })
                
                </script>
        </section>
    </header>
</body>