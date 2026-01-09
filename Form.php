<?php
/**
 * Class Form
 * Helper untuk membuat elemen form HTML
 */
class Form {
    private $fields = array();
    private $action;
    private $submit = "Simpan";

    public function __construct($action = "", $submit = "Simpan") {
        $this->action = $action;
        $this->submit = $submit;
    }

    // Menampilkan field input
    public function displayForm() {
        echo "<form action='{$this->action}' method='post'>";
        echo "<table width='100%'>";
        foreach ($this->fields as $field) {
            echo "<tr>";
            echo "<td width='200'>" . $field['label'] . "</td>";
            echo "<td>" . $field['field'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td></td>";
        echo "<td><input type='submit' name='submit' value='{$this->submit}'></td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
    }

    // Menambah field teks/input biasa
    public function addField($name, $label, $value = "", $type = "text") {
        $this->fields[] = array(
            'label' => $label,
            'field' => "<input type='{$type}' name='{$name}' value='{$value}'>"
        );
    }
}
?>