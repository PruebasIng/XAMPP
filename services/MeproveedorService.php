<?php

/**
 *  README for sample service
 *
 *  This generated sample service contains functions that illustrate typical service operations.
 *  Use these functions as a starting point for creating your own service implementation. Modify the 
 *  function signatures, references to the database, and implementation according to your needs. 
 *  Delete the functions that you do not use.
 *
 *  Save your changes and return to Flash Builder. In Flash Builder Data/Services View, refresh 
 *  the service. Then drag service operations onto user interface components in Design View. For 
 *  example, drag the getAllItems() operation onto a DataGrid.
 *  
 *  This code is for prototyping only.
 *  
 *  Authenticate the user prior to allowing them to call these methods. You can find more 
 *  information at http://www.adobe.com/go/flex_security
 *
 */
class MeproveedorService {

	var $username = "root";
	var $password = "Xampp2014";
	var $server = "localhost";
	var $port = "3306";
	var $databasename = "fricar";
	var $tablename = "me_proveedor";

	var $connection;

	/**
	 * The constructor initializes the connection to database. Everytime a request is 
	 * received by Zend AMF, an instance of the service class is created and then the
	 * requested method is invoked.
	 */
	public function __construct() {
	  	$this->connection = mysqli_connect(
	  							$this->server,  
	  							$this->username,  
	  							$this->password, 
	  							$this->databasename,
	  							$this->port
	  						);

		$this->throwExceptionOnError($this->connection);
	}

	/**
	 * Returns all the rows from the table.
	 *
	 * Add authroization or any logical checks for secure access to your data 
	 *
	 * @return array
	 */
	public function getAllMe_proveedor() {

		$stmt = mysqli_prepare($this->connection, "SELECT * FROM $this->tablename");		
		$this->throwExceptionOnError();
		
		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		$rows = array();
		
		mysqli_stmt_bind_result($stmt, $row->Tipo_Doc_Proveedor, $row->Id_Proveedor, $row->Nombre_Proveedor, $row->Direccion_Proveedor, $row->Tel_Proveedor, $row->Cel_Proveedor, $row->Email_Proveedor, $row->Tipo_Contribuyente, $row->Tipo_Regimen, $row->Materia_Prima, $row->Plazo_Negociacion, $row->Forma_Pago, $row->Estado_Proveedor, $row->Tipo_Doc_Representante, $row->Id_Representante, $row->Nombres_Representante, $row->Apellidos_Representante, $row->Nom_Com_Representante, $row->Email_Representante, $row->Tipo_Doc_Contacto, $row->Id_Contacto, $row->Nombres_Contacto, $row->Apellidos_Contacto, $row->Nom_Com_Contacto, $row->Email_Contacto, $row->Tel_Contacto, $row->Cel_Contacto);
		
	    while (mysqli_stmt_fetch($stmt)) {
	      $rows[] = $row;
	      $row = new stdClass();
	      mysqli_stmt_bind_result($stmt, $row->Tipo_Doc_Proveedor, $row->Id_Proveedor, $row->Nombre_Proveedor, $row->Direccion_Proveedor, $row->Tel_Proveedor, $row->Cel_Proveedor, $row->Email_Proveedor, $row->Tipo_Contribuyente, $row->Tipo_Regimen, $row->Materia_Prima, $row->Plazo_Negociacion, $row->Forma_Pago, $row->Estado_Proveedor, $row->Tipo_Doc_Representante, $row->Id_Representante, $row->Nombres_Representante, $row->Apellidos_Representante, $row->Nom_Com_Representante, $row->Email_Representante, $row->Tipo_Doc_Contacto, $row->Id_Contacto, $row->Nombres_Contacto, $row->Apellidos_Contacto, $row->Nom_Com_Contacto, $row->Email_Contacto, $row->Tel_Contacto, $row->Cel_Contacto);
	    }
		
		mysqli_stmt_free_result($stmt);
	    mysqli_close($this->connection);
	
	    return $rows;
	}

	/**
	 * Returns the item corresponding to the value specified for the primary key.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 * @return stdClass
	 */
	public function getMe_proveedorByID($itemID) {
		
		$stmt = mysqli_prepare($this->connection, "SELECT * FROM $this->tablename where Id_Proveedor=?");
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_param($stmt, 'i', $itemID);		
		$this->throwExceptionOnError();
		
		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_result($stmt, $row->Tipo_Doc_Proveedor, $row->Id_Proveedor, $row->Nombre_Proveedor, $row->Direccion_Proveedor, $row->Tel_Proveedor, $row->Cel_Proveedor, $row->Email_Proveedor, $row->Tipo_Contribuyente, $row->Tipo_Regimen, $row->Materia_Prima, $row->Plazo_Negociacion, $row->Forma_Pago, $row->Estado_Proveedor, $row->Tipo_Doc_Representante, $row->Id_Representante, $row->Nombres_Representante, $row->Apellidos_Representante, $row->Nom_Com_Representante, $row->Email_Representante, $row->Tipo_Doc_Contacto, $row->Id_Contacto, $row->Nombres_Contacto, $row->Apellidos_Contacto, $row->Nom_Com_Contacto, $row->Email_Contacto, $row->Tel_Contacto, $row->Cel_Contacto);
		
		if(mysqli_stmt_fetch($stmt)) {
	      return $row;
		} else {
	      return null;
		}
	}

	/**
	 * Returns the item corresponding to the value specified for the primary key.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 * @return stdClass
	 */
	public function createMe_proveedor($item) {

		$stmt = mysqli_prepare($this->connection, "INSERT INTO $this->tablename (Tipo_Doc_Proveedor, Id_Proveedor, Nombre_Proveedor, Direccion_Proveedor, Tel_Proveedor, Cel_Proveedor, Email_Proveedor, Tipo_Contribuyente, Tipo_Regimen, Materia_Prima, Plazo_Negociacion, Forma_Pago, Estado_Proveedor, Tipo_Doc_Representante, Id_Representante, Nombres_Representante, Apellidos_Representante, Nom_Com_Representante, Email_Representante, Tipo_Doc_Contacto, Id_Contacto, Nombres_Contacto, Apellidos_Contacto, Nom_Com_Contacto, Email_Contacto, Tel_Contacto, Cel_Contacto) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$this->throwExceptionOnError();

		mysqli_stmt_bind_param($stmt, 'issssssiisiiiisssssisssssss', $item->Tipo_Doc_Proveedor, $item->Id_Proveedor, $item->Nombre_Proveedor, $item->Direccion_Proveedor, $item->Tel_Proveedor, $item->Cel_Proveedor, $item->Email_Proveedor, $item->Tipo_Contribuyente, $item->Tipo_Regimen, $item->Materia_Prima, $item->Plazo_Negociacion, $item->Forma_Pago, $item->Estado_Proveedor, $item->Tipo_Doc_Representante, $item->Id_Representante, $item->Nombres_Representante, $item->Apellidos_Representante, $item->Nom_Com_Representante, $item->Email_Representante, $item->Tipo_Doc_Contacto, $item->Id_Contacto, $item->Nombres_Contacto, $item->Apellidos_Contacto, $item->Nom_Com_Contacto, $item->Email_Contacto, $item->Tel_Contacto, $item->Cel_Contacto);
		$this->throwExceptionOnError();

		mysqli_stmt_execute($stmt);		
		$this->throwExceptionOnError();

		$autoid = $item->Id_Proveedor;

		mysqli_stmt_free_result($stmt);		
		mysqli_close($this->connection);

		return $autoid;
	}

	/**
	 * Updates the passed item in the table.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * @param stdClass $item
	 * @return void
	 */
	public function updateMe_proveedor($item) {
	
		$stmt = mysqli_prepare($this->connection, "UPDATE $this->tablename SET Tipo_Doc_Proveedor=?, Nombre_Proveedor=?, Direccion_Proveedor=?, Tel_Proveedor=?, Cel_Proveedor=?, Email_Proveedor=?, Tipo_Contribuyente=?, Tipo_Regimen=?, Materia_Prima=?, Plazo_Negociacion=?, Forma_Pago=?, Estado_Proveedor=?, Tipo_Doc_Representante=?, Id_Representante=?, Nombres_Representante=?, Apellidos_Representante=?, Nom_Com_Representante=?, Email_Representante=?, Tipo_Doc_Contacto=?, Id_Contacto=?, Nombres_Contacto=?, Apellidos_Contacto=?, Nom_Com_Contacto=?, Email_Contacto=?, Tel_Contacto=?, Cel_Contacto=? WHERE Id_Proveedor=?");		
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_param($stmt, 'isssssiisiiiisssssissssssss', $item->Tipo_Doc_Proveedor, $item->Nombre_Proveedor, $item->Direccion_Proveedor, $item->Tel_Proveedor, $item->Cel_Proveedor, $item->Email_Proveedor, $item->Tipo_Contribuyente, $item->Tipo_Regimen, $item->Materia_Prima, $item->Plazo_Negociacion, $item->Forma_Pago, $item->Estado_Proveedor, $item->Tipo_Doc_Representante, $item->Id_Representante, $item->Nombres_Representante, $item->Apellidos_Representante, $item->Nom_Com_Representante, $item->Email_Representante, $item->Tipo_Doc_Contacto, $item->Id_Contacto, $item->Nombres_Contacto, $item->Apellidos_Contacto, $item->Nom_Com_Contacto, $item->Email_Contacto, $item->Tel_Contacto, $item->Cel_Contacto, $item->Id_Proveedor);		
		$this->throwExceptionOnError();

		mysqli_stmt_execute($stmt);		
		$this->throwExceptionOnError();
		
		mysqli_stmt_free_result($stmt);		
		mysqli_close($this->connection);
	}

	/**
	 * Deletes the item corresponding to the passed primary key value from 
	 * the table.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 * @return void
	 */
	public function deleteMe_proveedor($itemID) {
				
		$stmt = mysqli_prepare($this->connection, "DELETE FROM $this->tablename WHERE Id_Proveedor = ?");
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_param($stmt, 's', $itemID);
		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		mysqli_stmt_free_result($stmt);		
		mysqli_close($this->connection);
	}


	/**
	 * Returns the number of rows in the table.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 */
	public function count() {
		$stmt = mysqli_prepare($this->connection, "SELECT COUNT(*) AS COUNT FROM $this->tablename");
		$this->throwExceptionOnError();

		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_result($stmt, $rec_count);
		$this->throwExceptionOnError();
		
		mysqli_stmt_fetch($stmt);
		$this->throwExceptionOnError();
		
		mysqli_stmt_free_result($stmt);
		mysqli_close($this->connection);
		
		return $rec_count;
	}


	/**
	 * Returns $numItems rows starting from the $startIndex row from the 
	 * table.
	 *
	 * Add authorization or any logical checks for secure access to your data 
	 *
	 * 
	 * 
	 * @return array
	 */
	public function getMe_proveedor_paged($startIndex, $numItems) {
		
		$stmt = mysqli_prepare($this->connection, "SELECT * FROM $this->tablename LIMIT ?, ?");
		$this->throwExceptionOnError();
		
		mysqli_stmt_bind_param($stmt, 'ii', $startIndex, $numItems);
		mysqli_stmt_execute($stmt);
		$this->throwExceptionOnError();
		
		$rows = array();
		
		mysqli_stmt_bind_result($stmt, $row->Tipo_Doc_Proveedor, $row->Id_Proveedor, $row->Nombre_Proveedor, $row->Direccion_Proveedor, $row->Tel_Proveedor, $row->Cel_Proveedor, $row->Email_Proveedor, $row->Tipo_Contribuyente, $row->Tipo_Regimen, $row->Materia_Prima, $row->Plazo_Negociacion, $row->Forma_Pago, $row->Estado_Proveedor, $row->Tipo_Doc_Representante, $row->Id_Representante, $row->Nombres_Representante, $row->Apellidos_Representante, $row->Nom_Com_Representante, $row->Email_Representante, $row->Tipo_Doc_Contacto, $row->Id_Contacto, $row->Nombres_Contacto, $row->Apellidos_Contacto, $row->Nom_Com_Contacto, $row->Email_Contacto, $row->Tel_Contacto, $row->Cel_Contacto);
		
	    while (mysqli_stmt_fetch($stmt)) {
	      $rows[] = $row;
	      $row = new stdClass();
	      mysqli_stmt_bind_result($stmt, $row->Tipo_Doc_Proveedor, $row->Id_Proveedor, $row->Nombre_Proveedor, $row->Direccion_Proveedor, $row->Tel_Proveedor, $row->Cel_Proveedor, $row->Email_Proveedor, $row->Tipo_Contribuyente, $row->Tipo_Regimen, $row->Materia_Prima, $row->Plazo_Negociacion, $row->Forma_Pago, $row->Estado_Proveedor, $row->Tipo_Doc_Representante, $row->Id_Representante, $row->Nombres_Representante, $row->Apellidos_Representante, $row->Nom_Com_Representante, $row->Email_Representante, $row->Tipo_Doc_Contacto, $row->Id_Contacto, $row->Nombres_Contacto, $row->Apellidos_Contacto, $row->Nom_Com_Contacto, $row->Email_Contacto, $row->Tel_Contacto, $row->Cel_Contacto);
	    }
		
		mysqli_stmt_free_result($stmt);		
		mysqli_close($this->connection);
		
		return $rows;
	}
	
	
	/**
	 * Utility function to throw an exception if an error occurs 
	 * while running a mysql command.
	 */
	private function throwExceptionOnError($link = null) {
		if($link == null) {
			$link = $this->connection;
		}
		if(mysqli_error($link)) {
			$msg = mysqli_errno($link) . ": " . mysqli_error($link);
			throw new Exception('MySQL Error - '. $msg);
		}		
	}
}

?>
