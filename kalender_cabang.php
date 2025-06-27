<?php
session_start();
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUKU TAMU</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon kalender -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image" href="img/sekolah.png">
  <style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f7f6;
}

.calendar-container {
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 1100px;
    margin-left: auto;
    margin-right: auto;
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    width: 100%;
    background-color: #007a3d;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.calendar-header h3 {
    margin: 0;
    font-size: 1.5rem;
}

.calendar-days {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    text-align: center;
}

.calendar-days div {
    padding: 15px;
    background-color: #ffffff;
    border-radius: 8px;
    transition: background-color 0.3s ease;
    font-size: 1.1rem;
    cursor: pointer;
}

.calendar-days div:hover {
    background-color:  #007a3d;
    color: white;
}

.calendar-days .today {
    background-color: #6c757d;
    color: white;
}

.calendar-days .holiday {
    background-color: #dc3545;
    color: white;
}

/* Styling for back button (to Dashboard) */
.back-btn {
    background-color:#6c757d;
    color: white;
    font-size: 1.1rem;
    padding: 10px 15px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 20px;
}

.back-btn:hover {
    background-color:#6c757d;
    transform: translateY(-3px);
}

.back-btn:active {
    transform: translateY(1px);
}

@media (max-width: 768px) {
    .calendar-header {
        flex-direction: column;
        align-items: center;
    }

    .calendar-header h3 {
        margin-top: 10px;
    }

    .calendar-days div {
        padding: 12px;
        font-size: 1rem;
    }

    .back-btn {
        font-size: 1rem;
        padding: 8px 12px;
    }
}

@media (max-width: 576px) {
    .calendar-days {
        grid-template-columns: repeat(7, 1fr);
        gap: 2px;
    }

    .calendar-days div {
        padding: 10px;
        font-size: 0.9rem;
    }

    .back-btn {
        font-size: 0.9rem;
        padding: 8px 12px;
    }
}
  </style>
</head>
<body>

<div class="calendar-container">
    <div class="calendar-header">
        <button class="btn btn-light" onclick="changeMonth(-1)">
            <i class="fas fa-chevron-left"></i>
        </button>
        <h3 id="month-year"></h3>
        <button class="btn btn-light" onclick="changeMonth(1)">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    <div class="calendar-days" id="calendar-days"></div>
    <!-- Back Button to Dashboard -->
    <button class="back-btn" onclick="goBackToDashboard()">Kembali</button>
</div>

<script>
    const holidays = ["2024-12-25", "2024-12-31"]; // Contoh hari libur
    let currentDate = new Date();
    let currentMonth = currentDate.getMonth(); // Bulan saat ini
    let currentYear = currentDate.getFullYear(); // Tahun saat ini

    function renderCalendar() {
        const monthYear = document.getElementById('month-year');
        const calendarDays = document.getElementById('calendar-days');

        const year = currentYear;
        const month = currentMonth;

        monthYear.textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${year}`;

        const firstDayOfMonth = new Date(year, month, 1);
        const lastDayOfMonth = new Date(year, month + 1, 0);
        const daysInMonth = lastDayOfMonth.getDate();

        const firstDayOfWeek = firstDayOfMonth.getDay();
        const lastDayOfWeek = lastDayOfMonth.getDay();

        const totalDaysInGrid = 42; // Total kotak kalender (6 minggu x 7 hari)

        let days = [];
        for (let i = 0; i < totalDaysInGrid; i++) {
            const dayNum = i - firstDayOfWeek + 1;
            if (dayNum > 0 && dayNum <= daysInMonth) {
                const dayString = `${year}-${month + 1}-${dayNum}`;
                days.push({
                    date: dayNum,
                    isToday: dayNum === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate.getFullYear(),
                    isHoliday: holidays.includes(dayString)
                });
            } else {
                days.push(null);
            }
        }

        calendarDays.innerHTML = '';
        days.forEach(day => {
            const dayDiv = document.createElement('div');
            if (day) {
                dayDiv.textContent = day.date;
                if (day.isToday) {
                    dayDiv.classList.add('today');
                }
                if (day.isHoliday) {
                    dayDiv.classList.add('holiday');
                }
            }
            calendarDays.appendChild(dayDiv);
        });
    }

    function changeMonth(offset) {
        currentMonth += offset;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        } else if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        currentDate.setMonth(currentMonth);
        currentDate.setFullYear(currentYear);
        renderCalendar();
    }

    // Kembali ke halaman Dashboard
    function goBackToDashboard() {
        // Ganti URL ini dengan URL dashboard yang sesuai
        window.location.href = "cabang.php";  // Misalnya /dashboard atau halaman utama
    }

    // Initial render
    renderCalendar();
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
