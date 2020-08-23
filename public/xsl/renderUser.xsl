<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <h2>Orders</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>Id</th>
      <th>Name</th>
      <th>User ID Card</th>
      <th>Email</th>
      <th>Verified At</th>
      <th>Credit</th>
      <th>Created At</th>
    </tr>
    <xsl:for-each select="root/user">
    <tr>
      <td><xsl:value-of select="id" /></td>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="user_id_card" /></td>
      <td><xsl:value-of select="email" /></td>
      <td><xsl:value-of select="email_verified_at" /></td>
      <td><xsl:value-of select="credit" /></td>
      <td><xsl:value-of select="created_at" /></td>
    </tr>
    </xsl:for-each>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td >Total number of users <xsl:value-of select="count(//user)"/></td>
      <td></td>
    </tr>
  </table>
</xsl:template>

</xsl:stylesheet>