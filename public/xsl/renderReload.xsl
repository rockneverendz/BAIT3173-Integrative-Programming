<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <h2>Reloads</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>Reload ID</th>
      <th>Admin ID</th>
      <th>User ID</th>
      <th>Amount</th>
      <th>Created At</th>
    </tr>
    <xsl:for-each select="root/reload">
    <tr>
      <td><xsl:value-of select="id" /></td>
      <td><xsl:value-of select="admin_id" /></td>
      <td><xsl:value-of select="user_id" /></td>
      <td><xsl:value-of select="amount" /></td>
      <td><xsl:value-of select="created_at" /></td>
    </tr>
    </xsl:for-each>
    <tr>
      <td></td>
      <td></td>
      <td>Total</td>
      <td><xsl:value-of select="sum(//amount)"/></td>
      <td></td>
    </tr>
  </table>
</xsl:template>

</xsl:stylesheet>