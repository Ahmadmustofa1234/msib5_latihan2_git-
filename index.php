<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <center>
        <h2>Hitung Nilai Rata Rata</h2>
    </center>

<div class="container">
  <form id="nilaiForm">
    <div class="row">
      <div class="col-25">
        <label for="fname">Nama</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" placeholder="Nama Lengkap....." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Mata Kuliah</label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" placeholder="Mata Kuliah....." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Grade</label>
      </div>
      <div class="col-75">
        <select id="country" name="country" required>
          <option value="">Pilih Grade</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
      </div>
    </div>
    <div class="row">
      <input type="button" value="Tambahkan" onclick="addRow()">
    </div>
  </form>

  <table id="dataTable">
    <tr>
      <th>Nama</th>
      <th>Mata Kuliah</th>
      <th>Grade</th>
      <th>Nilai</th>
      <th>Aksi</th>
    </tr>
  </table>
  <h3>Rata-Rata Nilai: <span id="rataRata">-</span></h3>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
function addRow() {
  var nama = document.getElementById("fname").value;
  var mataKuliah = document.getElementById("lname").value;
  var grade = document.getElementById("country").value;

  if (nama === "" ) {
    alert("Nama harus diisi!");
    return;
  } else if(mataKuliah === "" ){
    alert("Mata Kuliah harus diisi!");
    return;
  } else if(grade===""){
    alert("Grade harus diisi!");
    return;
  }

  var nilai;
  if (grade === "A") {
    nilai = 4.00;
  } else if (grade === "B") {
    nilai = 3.00;
  } else if (grade === "C") {
    nilai = 2.00;
  } else if (grade === "D") {
    nilai = 1.00;
  } else {
    nilai = 0.00;
  }

  var table = document.getElementById("dataTable");
  var row = table.insertRow(-1);

  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);

  cell1.innerHTML = nama;
  cell2.innerHTML = mataKuliah;
  cell3.innerHTML = grade;
  cell4.innerHTML = nilai.toFixed(2);
  cell5.innerHTML = '<button onclick="deleteRow(this)">Hapus</button> <button onclick="updateRow(this)">Update</button>';

  updateRataRata();
  
  document.getElementById("fname").value = "";
  document.getElementById("lname").value = "";
  document.getElementById("country").value = "";

  // 
  // Setelah data ditambahkan
  Swal.fire({
    icon: 'success',
    title: 'Data Ditambahkan',
    showConfirmButton: false,
    timer: 1500
  });
}

function deleteRow(button) {
  var row = button.parentNode.parentNode;
  var table = document.getElementById("dataTable");
  table.deleteRow(row.rowIndex);
  updateRataRata();
}

function updateRow(button) {
  var row = button.parentNode.parentNode;
  var nama = row.cells[0].innerHTML;
  var mataKuliah = row.cells[1].innerHTML;
  var grade = row.cells[2].innerHTML;
  var nilai = parseFloat(row.cells[3].innerHTML);

  document.getElementById("fname").value = nama;
  document.getElementById("lname").value = mataKuliah;
  document.getElementById("country").value = grade;

  deleteRow(button); // Hapus baris yang ada
    // Setelah data diperbarui
    Swal.fire({
    icon: 'success',
    title: 'Data Diperbarui',
    showConfirmButton: false,
    timer: 1500
  });
}

function updateRataRata() {
  var table = document.getElementById("dataTable");
  var rowCount = table.rows.length - 1;

  var totalNilai = 0;
  for (var i = 1; i <= rowCount; i++) {
    var nilaiCell = table.rows[i].cells[3];
    totalNilai += parseFloat(nilaiCell.innerHTML);
  }

  var rataRata = totalNilai / rowCount;
  document.getElementById("rataRata").innerText = rataRata.toFixed(2);
  
}
</script>

</body>
</html>