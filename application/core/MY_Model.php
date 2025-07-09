<?php

/**
 * CodeIgniter3
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2024, CodeIgniter Foundation
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter3
 * @author	CodeIgniter3 Team
 * @copyright	Copyright (c) 2024, CodeIgniter3 Team (https://github.com/iescarro/codeigniter3-framework)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://github.com/iescarro/codeigniter3-framework
 * @since	Version 1.0.0
 * @filesource
 */
class MY_Model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  function day($column)
  {
    $driver = $this->db->dbdriver;
    switch ($driver) {
      case 'mysqli':
        return "DAY($column)";
      case 'sqlite3':
        return "CAST(STRFTIME('%d', $column) AS INTEGER)";
      default:
        show_error("Unsupported DB driver: " . $driver);
    }
  }

  function month($column)
  {
    $driver = $this->db->dbdriver;
    switch ($driver) {
      case 'mysqli':
        return "MONTH($column)";
      case 'sqlite3':
        return "CAST(STRFTIME('%m', $column) AS INTEGER)";
      default:
        show_error("Unsupported DB driver: " . $driver);
    }
  }

  function year($column)
  {
    $driver = $this->db->dbdriver;
    switch ($driver) {
      case 'mysqli':
        return "YEAR($column)";
      case 'sqlite3':
        return "CAST(STRFTIME('%Y', $column) AS INTEGER)";
      default:
        show_error("Unsupported DB driver: " . $driver);
    }
  }

  function if($condition, $true, $false)
  {
    $driver = $this->db->dbdriver;
    switch ($driver) {
      case 'mysqli':
        return "IF($condition, $true, $false)";
      case 'sqlite3':
        return "CASE WHEN $condition THEN $true ELSE $false END";
      default:
        show_error("Unsupported DB driver: " . $driver);
    }
  }

  function concat(...$args)
  {
    $driver = $this->db->dbdriver;
    if (empty($args)) {
      return "''"; // Return empty string if nothing to concat
    }
    switch ($driver) {
      case 'mysqli':
        return 'CONCAT(' . implode(', ', $args) . ')';

      case 'sqlite3':
        // Join using || for SQLite
        return implode(' || ', $args);

      default:
        show_error("Unsupported DB driver for db_concat: " . $driver);
    }
  }

  function right($column, $length)
  {
    $driver = $this->db->dbdriver;
    switch ($driver) {
      case 'mysqli':
        return "RIGHT($column, $length)";
      case 'sqlite3':
        // SQLite uses substr with negative start to get the right side
        return "SUBSTR($column, -$length)";
      default:
        show_error("Unsupported DB driver for right(): " . $driver);
    }
  }

  function date_format($column, $format)
  {
    $driver = $this->db->dbdriver;

    switch ($driver) {
      case 'mysqli':
        return "DATE_FORMAT($column, '$format')";
      case 'sqlite3':
        // Convert MySQL-style format to SQLite format
        $sqliteFormat = strtr($format, [
          '%Y' => '%Y',  // Year, 4 digits
          '%m' => '%m',  // Month, 2 digits
          '%d' => '%d',  // Day, 2 digits
          '%H' => '%H',  // Hour (24)
          '%i' => '%M',  // Minute
          '%s' => '%S',  // Second
          // Add more if needed
        ]);
        return "STRFTIME('$sqliteFormat', $column)";
      default:
        show_error("Unsupported DB driver for date_format(): " . $driver);
    }
  }

  function now()
  {
    $driver = $this->db->dbdriver;
    switch ($driver) {
      case 'mysqli':
        return "NOW()";
      case 'sqlite3':
        return "DATETIME('now')";
      default:
        show_error("Unsupported DB driver for now(): " . $driver);
    }
  }
}
