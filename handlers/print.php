<?php
require_once 'session_start.php';
class Print_out{

    public static function login($couples){ ?>
        <h2>Log in - Click on your wedding  </h2><?php
        foreach($couples as $couple){
            ?>
                <a href="api.php?coupleId=<?=$couple->Id?>"><button class="couple" ><?=$couple->Name?></button></a>
            
            <?php
        }
    }

    public static function welcome(){
        ?>
        <h1>welcome <?=$_SESSION['coupleName']?></h1>
        <?php
    }

    public static function addCoupleForm(){
        ?>
        <h2>New Wedding</h2>
        <form action="api.php" method="POST">
        <p>
            couple name: <input type="text" name="newCouple" required> 
            <button type="submit" name="addCouple">add</button>
        </p>
        </form>
        <?php
    }

    public static function allGroups($allGroups){
        ?>
        <h2>Your Groups</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Group Name</th>
            </tr>
            <?php
            foreach($allGroups as $group){
                ?>
                <tr>
                    <td><?=$group->Id?></td>
                    <td><?=$group->Name?></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    public static function addGroup(){
         ?>
         <h2>add group </h2>
        <form action="api.php" method="POST">
            group name: <input type="text" name="groupName" required>
            <button type="submit" name="addGroup">add</button>
        </form>
         <?php
    }

    public static function allTables($Tables){
        ?>
        <h2>Your Tables</h2>
        <form action="api.php" method="POST">
        <table>
            <tr>
                <th>Table number</th>
                <th>number of seats</th>
                <th></th>
            </tr>
            <?php
            foreach($Tables as $table){
                ?>
                <tr>
                    <td><?=$table->Table_number?></td>
                    <td><?=$table->Seats?></td>
                    <td><button type="submit" name="deleteTable" value="<?=$table->Id?>">delete</button></td>
                </tr>
                <?php
            }
            ?>
        </table>
        </form>
        <?php
    }
     public static function addTable(){
         ?>
         <h2>add Table</h2>
        <form action="api.php" method="POST">
            <p>Table number: <input type="number" name="tableNumber" required></p>
            <p>Number of seats: <input type="number" name="seats" required></p>
            <p><button type="submit" name="addTable">add</button></p>
        </form>
         <?php
    }

    public static function addGestForm($groups){
        ?>
        <h2>Add Gest</h2>
        <div id="addGest">
            <form action="api.php" method="POST">
            <p>First Name: <input typy="text" name="firstName" required></p>
            <p>Family Name: <input typy="text" name="familyName" required></p>
            <p>Age: <input typy="number" name="age" required></p>
            <p>
            gender: <br>
            <input type="radio" name="gender" value="m" checked> Male<br>
            <input type="radio" name="gender" value="f"> Female<br>
            </p>
            <p>Phone: <input typy="text" name="phone"></p>
            <p>Group 1: 
            <select name="group1" required>
            <?php
            foreach($groups as $group){ ?>
                <option value="<?=$group->Id?>"><?=$group->Name?></option>
            <?php }
            ?>
            </select>
            </p>
                <p>Group 2: 
            <select name="group2" required>
            <?php
            foreach($groups as $group){?>
                <option value="<?=$group->Id?>"><?=$group->Name?></option>
            <?php }
            ?>
            </select>
            </p>
                <p>Group 3: 
            <select name="group3" required>
            <?php
            foreach($groups as $group){ ?>
                <option value="<?=$group->Id?>"><?=$group->Name?></option>
            <?php }
            ?>
            </select>
            </p>
            <button type="submit" name="addGest">add gest</button>
            </form>
        </div>
        <?php
    }
    public static function allGests($allGests){ ?>
    <h2>All Gests</h2>
    <form action="api.php" method="POST">
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Family Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Group 1</th>
                <th>Group 2</th>
                <th>Group 3</th>
                <th>Arrived ?</th>
                <th>arrive!</th>
                <th>delete</th>
            </tr>
    <?php
        foreach($allGests as $gest){  ?>
            <tr>
                <td><?=$gest->Id?></td>
                <td><?=$gest->First_name?></td>
                <td><?=$gest->Family_name?></td>
                <td><?=$gest->Age?></td>
                <td><?=$gest->Gender?></td>
                <td><?=$gest->Phone?></td>
                <td><?=$gest->group1?></td>
                <td><?=$gest->group2?></td>
                <td><?=$gest->group3?></td>
                <td><?=$gest->Arrived?></td>
                <td><button type ="submit" name="getstArrive" value="<?=$gest->Id?>">arrive!</button</td>
                <td><button type ="submit" name="deleteGest" value="<?=$gest->Id?>">delete gest</button></td>
            </tr>
        <?php
        } ?>
        </table>
        </form> <?php
    }





}