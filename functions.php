<?php
    session_start();
    function getHeader()
    {
        include 'header.php';
    }

    function getFooter()
    {
        include 'footer.php';
    }

    
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "smartedu";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
    }
    
    function CloseCon($conn)
    {
        $conn -> close();
    }

    function getAllSubjects()
    {
        $conn = OpenCon();
        $query = "SELECT * FROM subjects";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            return $result;
        }
    }

    function getSubjectDataById($id)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM subjects WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            return $result;
        }
    }

    function getAllChapterBySubjectId($subjectId)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM chapters WHERE subject_id='".$subjectId."'";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            return $result;
        }
    }

    function getChapterDataById($id)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM chapters WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            return $result;
        }
    }

    function getAllTopicByChapterId($id)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM topics WHERE chapter_id='".$id."'";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            return $result;
        }
    }

    function getTopicDataById($id)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM topics WHERE id='".$id."'";
        $result = mysqli_query($conn,$query);
        if($result)
        {
            return $result;
        }
    }
?>