<?php # WriteToFile.php

/* The WriteToFile class.
 * The class contains one attribute: $_fp.
 * The class contains three methods: __construct(), write(), close(), and __destruct().
 */
class WriteToFile {
    
    // For storing the file pointer:
    private $_fp = NULL;

    // For storing an error message:
    private $_message = '';
    
    // Constructor opens the file:
    function __construct($file = null, $mode = 'w') {
    
        // Assign the file name and mode
        // to the message attribute:
        $this->_message = "File: $file Mode: $mode";
        
        // Make sure a file name was provided:
        if (empty($file))
          throw new FileException($this->_message, 0);

        // Make sure the file exists:
        if (!file_exists($file))
          throw new FileException($this->_message, 1);

        // Make sure the file is a file:
        if (!is_file($file))
          throw new FileException($this->_message, 2);

        // Make sure the file is writable, when necessary
        if (!is_writable($file))
          throw new FileException($this->_message, 3);

        // Validate the mode:
        if (!in_array($mode, array('a', 'a+', 'w', 'w+')))
          throw new FileException($this->_message, 4);
                
        // Open the file:
        $this->_fp = fopen($file, $mode);

    } // End of constructor.
    
    // This method writes data to the file:
    function write($data) {

        // Confirm the write:
        if (@!fwrite($this->_fp, $data . "\n")) throw new FileException($this->_message . " Data: $data", 5);

    } // End of write() method.
    
    // This method closes the file:
    function close() {

        // Make sure it's open:
        if ($this->_fp) {
            if (@!fclose($this->_fp)) throw new FileException($this->_message, 6);
            $this->_fp = NULL;
        }   

    } // End of close() method.

    // The destructor calls close(), just in case:
    function __destruct() {
        $this->close();
    } // End of destructor.
    
} // End of WriteToFile class.