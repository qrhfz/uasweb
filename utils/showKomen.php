<?php
function showKomen($mysqli, $id_post, $id_user)
{
    $dataKomen = mysqli_query($mysqli, "SELECT u.username,u.id_user, u.email, k.isi_komen, k.waktu_komen, k.id_komen FROM komen k INNER JOIN user u ON u.id_user=k.id_user AND k.id_post='$id_post' ");
    if (mysqli_num_rows($dataKomen) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($dataKomen)) {
?>
            <div class="card card-white post">
                <div class="post-heading">
                    <div class="float-left image">
                        <img src="https://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $row["email"] ) ) );?>" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="float-left meta">
                        <div class="title h5">
                            <a href="profil.php?id=<?php echo $row["id_user"]; ?>"><b><?php echo $row["username"]; ?></b></a>
                        </div>
                        <h6 class="text-muted time"><?php echo date("d M y", strtotime($row["waktu_komen"]) ); ?></h6>
                        
                    </div>
                </div>
                <div class="post-description">
                    <p id="isi-komen-<?php echo $row["id_komen"];?>"><?php echo $row["isi_komen"]; ?></p>
                    <?php
                if ($row["id_user"] == $id_user) {
                    echo '<button type="button" class="btn btn-primary btn-sm edit-komen mr-2" id="edit-komen-' . $row["id_komen"] . '"><i class="fas fa-edit"></i> Edit</button>';
                }

                if (isset($_SESSION['jenis_akun']) && $_SESSION['jenis_akun'] == 1) {
                    echo '<a class="btn btn-danger btn-sm mr-2" href="proses_del_komen.php?id=' . $row["id_komen"] . '"><i class="fas fa-eraser"></i> Delete</a>';
                }

                ?>
                </div>

            </div>
    <?php
        }
    } else {
        echo "tidak ada komen";
    }
    ?>
    <script>
        $(document).ready(function() {
            $('.edit-komen').on('click', function() {
                var id = $(this).attr('id').replace(/edit-komen-/, '');

                $("textarea#edit-isi").val($("#isi-komen-" + id).text());
                $("#edit-id").val(id);
                $('#editkomenmodal').modal({
                    show: true
                });

            });
        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="editkomenmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="proses_edit_komen.php" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Komen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea name="isi_komentar" id="edit-isi" class="form-control">

                            </textarea>
                        </div>
                        <input type="hidden" id="edit-id" name="id_komentar" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}

?>