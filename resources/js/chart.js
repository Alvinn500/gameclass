const data = {
    labels: ["Selesai", "Belum Selesai"], // Label untuk bagian chart
    datasets: [
        {
            data: [5, 5], // Nilai data: 5 selesai, 5 belum selesai
            backgroundColor: ["#7200ff", "#191b2a"],
            hoverBackgroundColor: ["#7200ff", "#191b2a"],
        },
    ],
};

new Chart(document.getElementById("myChart"), {
    type: "doughnut",
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false, // Sembunyikan legenda
            },
            tooltip: {
                enabled: true, // Tooltip akan ditampilkan
            },
        },
        cutout: "70%",
    },
});

Chart.register({
    id: "centerText",
    beforeDraw(chart) {
        let { width, height, ctx } = chart;
        ctx.restore();
        let fontSize = (height / 100).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        ctx.fillStyle = "#fff";

        let text = "5/5"; // Ubah teks jika perlu
        let textX = Math.round((width - ctx.measureText(text).width) / 2);
        let textY = height / 2;

        ctx.fillText(text, textX, textY);
        ctx.save();
    },
});
