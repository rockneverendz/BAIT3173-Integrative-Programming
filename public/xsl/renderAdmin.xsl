<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <h2>Admin</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Email</th>
      <th>Created At</th>
    </tr>
    <xsl:for-each select="root/admin">
    <tr>
      <td><xsl:value-of select="id" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="description" /></td>
      <td><xsl:value-of select="email" /></td>
      <td><xsl:value-of select="created_at" /></td>
    </tr>
    </xsl:for-each>
    <tr>
      <td></td>
      <td></td>
      <td >Total number of admin <xsl:value-of select="count(//admin)"/></td>
      <td></td>
      <td></td>
    </tr>
  </table>
</xsl:template>

</xsl:stylesheet>
