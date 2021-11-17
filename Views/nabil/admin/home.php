<?php
include_once '../includes/header.php';
if (!isset($_SESSION['userId'])) {
    header('location: ../index.php?m=Login to continue');
    exit;
}

$current_data = file_get_contents('../data/packages.json');
$array_data = json_decode($current_data, true);
?>

<div style="margin-top: 20px;" class="admin">
    <h1>Management Dashboard</h1>
    <div><a href="../tourpackages/insert.php"><button>Add new tour package</button></a></div>
    <p class="no-info" style="color: blue; font-size: 20px; margin-top: 15px;"><?php if (isset($_GET['m'])) echo ($_GET['m']) ?></p>

    <div id="viewall">
        <?php foreach ($array_data as $row) : ?>
            <a href="../tourpackages/update.php?id=<?php echo $row['id'] ?>">
                <div class="container">
                    <div>
                        <h2><?php echo $row['title'] ?></h2>
                    </div>
                    <div>
                        <p>Price: </p>
                        <p><?php echo $row['price'] ?></p>
                    </div>
                    <div>
                        <p>Duration: </p>
                        <p><?php echo $row['duration'] ?></p>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>

</div>

<script>
    document.getElementById("view-employees").addEventListener("click", () => {
        const req = new XMLHttpRequest();
        req.open("POST", "./home.php");
        req.responseType = "json";
        req.onreadystatechange = () =>
            req.readyState === 4 && appendResult(req.response);
        req.send();
    })

    function appendResult(response) {
        if (response.failed)
            document.querySelector(".no-info").textContent = response.m
        else {
            const viewall = document.getElementById("viewall")
            viewall.innerHTML = ""
            response.forEach(row => {
                const a = document.createElement("a")
                a.href = ``
                a.innerHTML = `
                <div class="container">
                    <div>
                        <h2>${row.name}</h2>
                        <h2><i>${row.role}</i></h2>
                    </div>
                    <div style="display: flex;">
                        <p>Contact: </p>
                        <p>${row.contact}</p>
                    </div>
                    <div>
                        <p>Department: </p>
                        <p>${row.department}</p>
                    </div>
                </div>
            `
                viewall.appendChild(a)
            });
        }
    }
</script>

<?php
include_once '../includes/footer.php';
